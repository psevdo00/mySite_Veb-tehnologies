<?php

    require_once 'app/models/model_statistic.php';

    class Controller_exit extends Controller {

        function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("exit");

            $this -> view -> generate('exit_view.php', 'template_view.php', null);

        }

    }