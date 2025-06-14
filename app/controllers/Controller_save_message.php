<?php

    require_once 'app/models/model_message.php';
    require_once 'app/models/model_statistic.php';

    class Controller_save_message extends Controller {

        function __construct(){

            $this -> model = new Model_message();
            $this -> view = new View();

        }

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Сохранение отзывов");

            if ($_SERVER['REQUEST_METHOD'] === "POST"){

                $tmpFilePath = $_FILES['file']['tmp_name'];

                $this -> model -> save_message_in_database($tmpFilePath);
                header('Location: save_message');
                exit;

            }

            $this -> view -> generate("save_message_view.php", "template_view.php", null);

        }

    }

?>