<?php

    require_once 'app/models/validations/FormValidation.php';
    require_once 'app/models/model_post.php';

    class Controller_edit_blog extends Controller {

        function __construct(){

            $this -> model = new Model_post();
            $this -> view = new View();

        }

        public function action_index(){

            $data = [];
            
            if ($_SERVER['REQUEST_METHOD'] === "POST"){

                if (isset($_FILES["csv_file"])){

                    $csvData = file_get_contents($_FILES["csv_file"]["tmp_name"]);
                    $lines = explode("\n", $csvData);

                    $headers = str_getcsv(array_shift($lines), ";", '"');

                    foreach ($lines as $line) {
                        // Указываем точку с запятой как разделитель и учитываем кавычки
                        $row = str_getcsv($line, ";", '"');
                        
                        // Фильтруем пустые строки
                        if ($row !== [null] && $row !== [""]) {
                            
                            $post = $this -> model;

                            $post -> setTitlePost($row[0]);
                            $post -> setInfoPost($row[1]);
                            $post -> setDate($row[3]);
                            $post -> setPhoto("");

                            $post -> save();
                            header('Location: edit_blog');
                            exit;
    
                        }
                    }

                } else {

                    foreach ($_POST as $k => $v) {

                        $data[$k] = trim($v);

                    }

                    $validator = new FormValidation();
                    $validation = $validator -> validate($data, [
                        "title_post" => [
                            "requered" => true,
                            "regex" => '/^[а-яА-Я\s]+$/u',
                        ],
                        'info_post' => [
                            'requered' => true,
                        ],
                    ]);

                    $data["errors"] = $validation->show_errors();

                    if (empty($data["errors"])){

                        $post = $this -> model;

                        $post -> setTitlePost($_POST["title_post"]);
                        $post -> setInfoPost($_POST["info_post"]);
                        $post -> setDate(date('d.m.y H:i'));

                        if (empty($_FILES)){

                            $post -> setPhoto("");

                        } else {

                            $post -> setPhoto($_FILES['photo_post']["name"]);

                            $uploadDir = "img/";
                            move_uploaded_file($_FILES['photo_post']["tmp_name"], $uploadDir . $_FILES['photo_post']["name"]);

                        }

                        $post -> save();
                        header('Location: edit_blog');
                        exit;

                    }

                }

            }

            $data["post"] = $this -> model -> findAll();

            $this -> view -> generate("edit_blog_view.php", "template_view.php", $data);

        }

    }

?>