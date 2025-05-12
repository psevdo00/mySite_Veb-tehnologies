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

        if (empty($this->id)) {
            // sql -> insert

            $fields = get_object_vars($this);
            unset($fields['id']);
            $columns = array_keys($fields);
            $placeholders = implode(', ', array_fill(0, count($columns), '?'));

            $sql = "INSERT INTO `" . static::$tableName . "` 
                    (`" . implode('`, `', $columns) . "`) 
                    VALUES ($placeholders)";

            $stmt = static::$pdo->prepare($sql);
            $stmt->execute(array_values($fields));

        } else {
            // sql -> update

            $fields = get_object_vars($this);
            unset($fields['id']);
            $columns = array_keys($fields);
            $setClause = implode(', ', array_map(fn($col) => "`$col` = ?", $columns));

  
            $sql = "UPDATE `" . static::$tableName . "` 
                    SET $setClause 
                    WHERE `id` = ?";


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