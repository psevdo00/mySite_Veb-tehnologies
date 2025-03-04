<?php

    class Controller_study extends Controller{

        public function action_index(){

            $this -> view -> generate("study_view.php", "template_view.php");

        }

    }

?>