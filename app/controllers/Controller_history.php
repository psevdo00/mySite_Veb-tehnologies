<?php

    class Controller_history extends Controller{

        public function action_index(){

            $this -> view -> generate("history_view.php", "template_view.php");

        }

    }

?>