<?php

    require_once 'app/models/model_statistic.php';

    class Controller_hobby extends Controller {

        function __construct(){

            $this -> model = new Model_hoddy();
            $this -> view = new View();

        }
        
        public function action_index() {

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Хобби");

            $data = $this -> model -> get_data();
            $this -> view -> generate("hobby_view.php", "template_view.php", $data);

        }

    }

?>