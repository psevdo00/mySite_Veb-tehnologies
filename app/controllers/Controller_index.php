<?php

    class Controller_index extends Controller {

        function action_index(){

            $this -> view -> generate('index_view.php', 'template_view.php');

        }

    }