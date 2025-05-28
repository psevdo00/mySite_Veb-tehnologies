<?php

    require_once 'app/models/model_statistic.php';

    class Controller_statistic extends Controller {

        function __construct(){

            $this -> model = new Model_statistic();
            $this -> view = new View();

        }

        public function action_index(){

            session_start();

            $data = $this -> model -> get_all_statistic();

            $this -> model -> save_statistic("Статистика");

            $this -> view -> generate("statistic_view.php", "template_view.php", $data);

        }

    }

?>