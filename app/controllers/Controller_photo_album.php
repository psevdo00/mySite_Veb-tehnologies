<?php

    class Controller_photo_album extends Controller {

        function __construct(){

            $this -> model = new Model_photo_album();
            $this -> view = new View();

        }        
        public function action_index(){

            $data = $this -> model -> get_data();
            $this -> view -> generate("photo_album_view.php", "template_view.php", $data);

        }

    }

?>