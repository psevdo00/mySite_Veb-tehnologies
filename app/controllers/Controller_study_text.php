<?php

    require_once 'app/models/validations/FormValidation.php';
    require_once 'app/models/validations/ResultsVerification.php';

    class Controller_study_text extends Controller{

        public function action_index(){

            $data = null;
            
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                $data = [];
                foreach ($_POST as $k => $v) {

                    $data[$k] = trim($v);

                }

                $verificator = new ResultsVerification();
                $verification = $verificator -> verificate($data, [
                    "quest1_1" => [

                        "ask1" => "Ложь",

                    ],
                    "quest1_2" => [

                        "ask1" => "Ложь",                            

                    ],
                    "quest2" => [

                        "ask_2_and_3" => "0014.057",

                    ],
                    "quest3" => [

                        "ask_2_and_3" => "цикл",

                    ],
                    "fio" => [

                        "requered" => true,
                        "regex" => '/^[а-яА-Я]+ [а-яА-Я]+ [а-яА-Я]+$/u',

                    ],
                    'group' => [

                        'requered' => true,      

                    ],
                ]);

                $data = $verification->show_errors();

                

            }

            if (!empty($data) && (!isset($data['fio']) || !isset($data['group']))) {

                $this -> view -> generate("result_view.php", "template_view.php", $data);

            } else {

                $this -> view -> generate("study_text_view.php", "template_view.php", $data);
                
            }
            
        }

    }

?>