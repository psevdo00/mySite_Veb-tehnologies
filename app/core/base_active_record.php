<?php

class BaseActiveRecord {

    public static $pdo;
    protected static $tableName;

    public $id;

    public static function setConnection() {
        if (!isset(static::$pdo)) {
            $dsn = "mysql:dbname=veb_university;host=localhost;port=3307;charset=utf8mb4";
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            ];
            static::$pdo = new PDO($dsn, "root", "", $options);
        }
    }

    public function save(){

        static::setConnection();

        $tableExists = static::$pdo->query("SHOW TABLES LIKE '" . static::$tableName . "'")->rowCount() > 0;
    
        if (!$tableExists) {
            // Создаем таблицу с правильным экранированием
            $sql = "CREATE TABLE `" . static::$tableName . "` (
                `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
                `title_post` VARCHAR(255) NOT NULL,
                `photo` VARCHAR(255) NULL,
                `info_post` VARCHAR(255),
                `date` TIMESTAMP DEFAULT CURRENT_TIMESTAMP
            ) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4";
            
            static::$pdo->exec($sql);
        }

        if (empty($this->id)) {
            // sql -> insert

            // Получаем все свойства объекта
            $fields = get_object_vars($this);

            // Удаляем id, если он есть (чтобы не вставлять его в запрос)
            unset($fields['id']);

            // Получаем названия колонок
            $columns = array_keys($fields);

            // Создаем плейсхолдеры
            $placeholders = implode(', ', array_fill(0, count($columns), '?'));

            // Формируем SQL запрос
            $sql = "INSERT INTO `" . static::$tableName . "` 
                    (`" . implode('`, `', $columns) . "`) 
                    VALUES ($placeholders)";

            // Подготавливаем запрос
            $stmt = static::$pdo->prepare($sql);

            // Выполняем запрос, передавая значения напрямую
            $stmt->execute(array_values($fields));

            // Получаем ID последней вставленной записи
            $this->id = static::$pdo->lastInsertId();

        } else {
            // sql -> update

            // Получаем все свойства объекта
            $fields = get_object_vars($this);

            // Удаляем id, чтобы не обновлять его
            unset($fields['id']);

            // Получаем названия колонок
            $columns = array_keys($fields);

            // Создаем плейсхолдеры для SET (например, `name = ?, email = ?`)
            $setClause = implode(', ', array_map(fn($col) => "`$col` = ?", $columns));

            // Формируем SQL-запрос
            $sql = "UPDATE `" . static::$tableName . "` 
                    SET $setClause 
                    WHERE `id` = ?";

            // Подготавливаем запрос
            $stmt = static::$pdo->prepare($sql);


        }

        return $this;

    }

    function delete(): bool { 
        
        static::setConnection();
        $sql = "DELETE FROM " . static::$tableName . " WHERE id = $this->id";
        static::$pdo->exec($sql);

        return true; 
    } 

    function find($id) {

        static::setConnection();

        $sql = "select * from " . static::$tableName . " where id = $id";
        $stmt = static::$pdo->query($sql); 

        if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $obj = new static();
            foreach ($row as $key => $value) {
                $setter = 'set' . str_replace('_', '', ucwords($key, '_'));
                if (method_exists($obj, $setter)) {
                    $obj->$setter($value);
                }
            }
            return $obj;
        }
        return null;

    }

    function findAll() {

        static::setConnection();
    
        $tableExists = static::$pdo->query("SHOW TABLES LIKE '" . static::$tableName . "'")->rowCount() > 0;
        
        if (!$tableExists) {
            return [];
        }
    
        $sql = "SELECT * FROM " . static::$tableName;
        $stmt = static::$pdo->query($sql);
        
        $result = [];
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $obj = new static();
            
            foreach ($row as $key => $value) {
                $setter = 'set' . str_replace('_', '', ucwords($key, '_'));
                if (method_exists($obj, $setter)) {
                    $obj->$setter($value);
                }
            }
            
            $result[] = $obj;
        }
        return $result;
    }

}

?>