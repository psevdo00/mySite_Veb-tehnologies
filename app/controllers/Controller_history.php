<?php

    require_once 'app/models/model_statistic.php';

    class Controller_history extends Controller{

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("История посещения");

            $this -> view -> generate("history_view.php", "template_view.php", null);

        }

    }

?>