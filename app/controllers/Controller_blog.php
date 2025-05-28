<?php

    require_once 'app/models/model_post.php';
    require_once 'app/models/model_statistic.php';

    class Controller_blog extends Controller {

        function __construct(){

            $this -> model = new Model_post();
            $this -> view = new View();

        }

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Блог");

            $data["post"] = $this -> model -> findAll();

            $this -> view -> generate("blog_view.php", "template_view.php", $data);

        }

    }

?>