<?php

    require_once 'app/models/model_statistic.php';

    class Controller_statistic extends Controller {

        function __construct(){

            $this -> model = new Model_statistic();
            $this -> view = new View();

        }

        public function action_index($page = 1){

            session_start();

            $dataInfo = $this -> model -> get_all_statistic();

            $statistic = $dataInfo;
            $statistic = array_reverse($dataInfo);

            $perPage = 10;
            $totalItem = count($statistic);
            $totalPage = ceil($totalItem / $perPage);

            $page = max(1, min($page, $totalPage));

            $offset = ($page - 1) * $perPage;
            $paginatedData = array_slice($statistic, $offset, $perPage);

            $data = [
                'statistic' => $paginatedData, // Данные для текущей страницы
                'page' => $page, // Текущая страница
                'totalPage' => $totalPage,   // Всего страниц
            ];

            $this -> model -> save_statistic("Статистика");

            $this -> view -> generate("statistic_view.php", "template_view.php", $data);

        }

    }

?>