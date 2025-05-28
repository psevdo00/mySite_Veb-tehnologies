<?php

    require_once 'app/models/validations/FormValidation.php';
    require_once 'app/models/model_statistic.php';

    class Controller_contact extends Controller {

        public function action_index() {

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Контакты");

            $data = null;
            
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                $data = [];
                foreach ($_POST as $k => $v) {

                    $data[$k] = trim($v);

                }

                $validator = new FormValidation();
                $validation = $validator -> validate($data, [
                    "fio" => [
                        "requered" => true,
                        "regex" => '/^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/u',
                    ],
                    'age' => [
                        'requered' => true,
                        'is_less' => '18',                        
                    ],
                    'num_phone' => [
                        'requered' => true,
                        'regex' => '/^\+([78])\d{10}$/',
                    ],
                    'email' => [
                        'requered' => true,
                        'regex' => '/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/',
                        'is_email' => true,
                    ],
                ]);

                $data = $validation->show_errors();

            }
            
            $this -> view -> generate("contact_view.php", "template_view.php", $data);

        }

    }

?>