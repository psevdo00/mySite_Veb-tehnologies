<?php

    class Controller_contact extends Controller {

        public function action_index() {

            $this -> view -> generate("contact_view.php", "template_view.php");

        }

    }

?>