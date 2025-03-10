<?php

    class Controller_result extends Controller {

        public function action_index() {
            
            $this -> view -> generate("result_view.php", "template_view.php", $data = null);

        }

    }

?>