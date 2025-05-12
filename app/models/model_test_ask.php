<?php

    require_once 'app/core/base_active_record.php';

    class Model_test_ask extends BaseActiveRecord{

        protected static $tableName = "test_ask";

        public $date;
        public $fio;
        public $ask;
        public $right_ask;

        public function getDate(){ return $this->date; }

        public function setDate($date){$this->date = $date; }

        public function getFio(){ return $this->fio; }

        public function setFio($fio) { $this->fio = $fio; }

        public function getAsk() { return $this->ask; }

        public function setAsk($ask) { $this->ask = $ask; }

        public function getRight() { return $this->right_ask; }

        public function setRight($right_ask) { $this->right_ask = $right_ask; }

        public function saveAsk($date, $asks, $fio) {
  
            $rightAnswers = ["Ложь", "0014,057", "Цикл"];

            foreach ($asks as $i => $answer) {

                $model = new Model_test_ask(); 
                
                $model->setDate($date);
                $model->setFio($fio);
                $model->setAsk($answer);
                $model->setRight($answer === ($rightAnswers[$i] ?? null));

                $model -> save();

            }
        }

    }

?>