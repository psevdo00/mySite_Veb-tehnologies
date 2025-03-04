<?php

    class Controller_study_text extends Controller{

        public function action_index(){

            $this -> view -> generate("study_text_view.php", "template_view.php");

        }

    }

?>