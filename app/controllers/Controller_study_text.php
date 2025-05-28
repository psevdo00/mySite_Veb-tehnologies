<?php

    require_once 'app/models/validations/FormValidation.php';
    require_once 'app/models/validations/ResultsVerification.php';
    require_once 'app/models/model_test_ask.php';
    require_once 'app/models/model_statistic.php';

    class Controller_study_text extends Controller{

        function __construct(){

            $this -> model = new Model_test_ask();
            $this -> view = new View();

        }

        public function action_index(){

            session_start();

            $modelS = new Model_statistic();
            $modelS -> save_statistic("Учебный тест");

            $data = null;
            
            if ($_SERVER['REQUEST_METHOD'] == "POST"){

                if (isset($_POST['ask1'], $_POST['ask2'], $_POST['ask3'], $_POST['fio'])){

                    $date = $_POST["date"];
                    $ask[] = $_POST["ask1"];
                    $ask[] = $_POST["ask2"];
                    $ask[] = $_POST["ask3"];
                    $fio = $_POST["fio"];

                    var_dump($ask);

                    $this -> model -> saveAsk($date, $ask, $fio);

                    header('Location: study_text');
                    exit;

                } else {
            
                    $data = [];

                    $data["ask"]["date"] = date('d.m.y H:i', strtotime('+1 hour'));

                    foreach ($_POST as $k => $v) {

                        $data["ask"][$k] = trim($v);

                    }

                    $verificator = new ResultsVerification();
                    $verification = $verificator -> verificate($data["ask"], [
                        "quest1_1" => [

                            "ask1" => "Ложь",

                        ],
                        "quest1_2" => [

                            "ask1" => "Ложь",                            

                        ],
                        "quest2" => [

                            "ask_2_and_3" => "0014,057",

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

                    $data["err"] = $verification->show_errors();

                }

            }



            $showResults = ($data != null) && empty($data["err"]) || (isset($data["err"]) && !isset($data["err"]['fio']) && !isset($data["err"]['group']));

            if ($showResults) {

                $this->view->generate("result_view.php", "template_view.php", $data);

            } else {

                $this->view->generate("study_text_view.php", "template_view.php", $data);
                
            }
            
        }

    }

?>