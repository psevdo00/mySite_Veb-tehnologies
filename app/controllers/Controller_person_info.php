<?php

    require_once 'app/models/model_statistic.php';

    class Controller_person_info extends Controller {

        function action_index(){

            session_start();
            
            $modelS = new Model_statistic();
            $modelS -> save_statistic("Биография");

            $this -> view -> generate('person_info_view.php', 'template_view.php', null);

        }

    }

?>