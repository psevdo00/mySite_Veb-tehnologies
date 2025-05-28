<?php

    require_once 'app/models/model_statistic.php';

    class Controller_404 extends Controller {

        function action_index() {

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Ошибка 404");

            $this -> view -> generate('404_view.php', 'template_view.php', null);

        }

    }