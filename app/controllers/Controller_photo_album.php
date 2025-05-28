<?php

    require_once 'app/models/model_statistic.php';

    class Controller_photo_album extends Controller {

        function __construct(){

            $this -> model = new Model_photo_album();
            $this -> view = new View();

        }        
        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Фотоальбом");

            $data = $this -> model -> get_data();
            $this -> view -> generate("photo_album_view.php", "template_view.php", $data);

        }

    }

?>