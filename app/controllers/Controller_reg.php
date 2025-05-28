<?php

    require_once 'app/models/validations/FormValidation.php';
    require_once 'app/models/Model_auth.php';
    require_once 'app/models/model_statistic.php';

    class Controller_reg extends Controller {

        function __construct(){

            $this -> model = new Model_auth();
            $this -> view = new View();

        }

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Регистрация");

            $data = null;
            
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                $data = [];
                foreach ($_POST as $k => $v) {

                    $data["value"][$k] = trim($v);

                }

                $validator = new FormValidation();
                $validation = $validator -> validate($data["value"], [
                    "fio" => [
                        "requered" => true,
                        "regex" => '/^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/u',
                    ],
                    'email' => [
                        'requered' => true,
                        'is_email' => true,                        
                    ],
                    'login' => [
                        'requered' => true,
                    ],
                    'password' => [
                        'requered' => true,
                    ],
                ]);

                $data["error"] = $validation->show_errors();

                if ($data["error"] == null){

                    $user = $this -> model -> findLogin($data["value"]["login"]);

                    if ($user) {

                        $data["error"]["login"] = "Такой аккаунт уже есть!";

                    } else {

                        $this -> model -> save_user_in_database($data["value"]);

                        $_SESSION['login'] = $data["value"]['login'];
                        $_SESSION['password'] = $data["value"]['passwords'];
                        $_SESSION['role'] = "isUser";

                        //TODO("Пользователь зарегистрирован и авторизован")

                    }

                }

            }

            $this -> view -> generate("reg_view.php", "template_view.php", $data);

        }

    }

?>