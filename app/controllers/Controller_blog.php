<?php

    require_once 'app/models/model_post.php';

    class Controller_blog extends Controller {

        function __construct(){

            $this -> model = new Model_post();
            $this -> view = new View();

        }

        public function action_index(){

            $data["post"] = $this -> model -> findAll();

            $this -> view -> generate("blog_view.php", "template_view.php", $data);

        }

    }

?>