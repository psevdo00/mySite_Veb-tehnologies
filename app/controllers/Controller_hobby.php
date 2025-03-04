<?php

    class Controller_hobby extends Controller {

        public function action_index() {

            $this -> view -> generate("hobby_view.php", "template_view.php");

        }

    }

?>