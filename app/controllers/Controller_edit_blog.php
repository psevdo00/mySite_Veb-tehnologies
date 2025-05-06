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

                        $post -> setPhoto("хуй 1");

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

            $data["post"] = $this -> model -> findAll();

            $this -> view -> generate("edit_blog_view.php", "template_view.php", $data);

        }

    }

?>