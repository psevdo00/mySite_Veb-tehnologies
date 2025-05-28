<?php

    require_once 'app/models/model_statistic.php';

    class Controller_index extends Controller {

        function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Главная страница");

            $this -> view -> generate('index_view.php', 'template_view.php', null);

        }

    }