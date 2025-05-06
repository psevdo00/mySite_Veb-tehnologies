<?php

    require_once 'app/models/validations/FormValidation.php';

    class Controller_guest_book extends Controller {

        function __construct(){

            $this -> model = new Model_guest_book();
            $this -> view = new View();

        }

        public function action_index(){

            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] === "POST"){

                foreach ($_POST as $k => $v) {

                    $data[$k] = trim($v);

                }

                $validator = new FormValidation();
                $validation = $validator -> validate($data, [
                    "fio" => [
                        "requered" => true,
                        "regex" => '/^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/u',
                    ],
                    'email' => [
                        'requered' => true,
                        'regex' => '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                        'is_email' => true,
                    ],
                ]);

                $data["errors"] = $validation->show_errors();

                if (empty($data["errors"])){

                    $this -> model -> save_message($_POST['fio'], $_POST['email'], $_POST['massage']);
                    header('Location: guest_book');
                    exit;

                }

            }

            if ($_SERVER['REQUEST_METHOD'] === "GET" && isset($_GET)){

                $filePath = fopen("txt/message.inc", "r");

                if (file_exists($filePath)) {
                    $file = fopen($filePath, "r");
                        // Читаем содержимое файла
                    $content = fread($file, filesize($filePath));
                    fclose($file);
                        
                        // Выводим содержимое (или обрабатываем для БД)
                    echo "<pre>" . htmlspecialchars($content) . "</pre>";
                        
                        // Здесь можно добавить запись в базу данных
                        // Например:
                        // $lines = explode("\n", $content);
                        // foreach ($lines as $line) {
                        //     saveToDatabase($line); // Ваша функция сохранения
                        // }
                } else {
                    echo "Ошибка: Файл не найден.";
                }


            }

            $data["message"] = $this -> model -> get_data();

            $this -> view -> generate("guest_book_view.php", "template_view.php", $data);

        }

    }

?>