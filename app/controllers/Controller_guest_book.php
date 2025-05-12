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

            $data["message"] = $this -> model -> get_data();

            $this -> view -> generate("guest_book_view.php", "template_view.php", $data);

        }

    }

?>