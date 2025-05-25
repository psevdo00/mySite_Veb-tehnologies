<?php

    //require_once 'app/models/model_auth.php';

    class Controller_auth extends Controller {

        function __construct(){

            $this -> model = new Model_auth();
            $this -> view = new View();

        }


        public function action_index(){

            $data = null;

            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                $data = [];
                foreach ($_POST as $k => $v) {

                    $data[$k] = trim($v);

                }

                $user = $this -> model -> findLogin($data["login"]);

                if ($user) {

                    if ($user['passwords'] == $data['password']){

                        //TODO("Пользователь авторизован")

                    } else {

                        $data["password_err"] = "Пароль не совпадает!";

                    }

                } else {

                    $data["login_err"] = "Такого аккаунта не найдено!";

                }

            }

            $this -> view -> generate("auth_view.php", "template_view.php", $data);

        }

    }

?>