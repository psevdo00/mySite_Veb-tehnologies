<?php

    class Controller_person_info extends Controller {

        function action_index(){

            $this -> view -> generate('person_info_view.php', 'template_view.php');

        }

    }

?>