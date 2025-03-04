<?php

    class Controller_photo_album extends Controller {

        public function action_index(){

            $this -> view -> generate("photo_album_view.php", "template_view.php");

        }

    }

?>