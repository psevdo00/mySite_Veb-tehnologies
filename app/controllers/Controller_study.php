<?php

    require_once 'app/models/model_statistic.php';

    class Controller_study extends Controller{

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Учеба");

            $this -> view -> generate("study_view.php", "template_view.php", null);

        }

    }

?>