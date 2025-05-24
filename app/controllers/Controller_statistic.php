<?php

    class Controller_statistic extends Controller {

        public function action_index(){

            $this -> view -> generate("statistic_view.php", "template_view.php");

        }

    }

?>