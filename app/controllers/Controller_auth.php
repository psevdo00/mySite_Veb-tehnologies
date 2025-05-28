<?php

    require_once 'app/models/model_statistic.php';

    class Controller_auth extends Controller {

        function __construct(){

            $this -> model = new Model_auth();
            $this -> view = new View();

        }

        public function go_to_site(){

            header("Location: ./index");

        }


        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Авторизация");

            $data = null;
            $loginAdmin = "admin";
            $passwordAdmin = "12345";

            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                $data = [];
                foreach ($_POST as $k => $v) {

                    $data[$k] = trim($v);

                }

                $user = $this -> model -> findLogin($data["login"]);

                if ($data['login'] == $loginAdmin && $data['password'] == $passwordAdmin){

                    $_SESSION['login'] = $loginAdmin;
                    $_SESSION['password'] = $passwordAdmin;
                    $_SESSION['role'] = "isAdmin";

                    $this -> go_to_site();

                }

                if ($user) {

                    if ($user['passwords'] == $data['password']){

                        $_SESSION['login'] = $user['login'];
                        $_SESSION['password'] = $user['passwords'];
                        $_SESSION['role'] = "isUser";

                        $this -> go_to_site();

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