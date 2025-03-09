<?php

    class Controller_hobby extends Controller {

        function __construct(){

            $this -> model = new Model_hoddy();
            $this -> view = new View();

        }
        
        public function action_index() {

            $data = $this -> model -> get_data();
            $this -> view -> generate("hobby_view.php", "template_view.php", $data);

        }

    }

?>