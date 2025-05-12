<?php

    require_once 'app/core/base_active_record.php';

    class Model_message extends BaseActiveRecord{

        protected static $tableName = "message";

        public $date;
        public $fio;
        public $email;
        public $info_message;

        public function setDate($date){

            $this -> date = $date;

        }

        public function setFio($fio){

            $this -> fio = $fio;

        }

        public function setEmail($email){

            $this -> email = $email;

        }

        public function setInfo_message($info_message){

            $this -> info_message = $info_message;

        }

        public function save_message_in_database($tmpFilePath){

            var_dump("Зашли в метод");

            if (is_uploaded_file($tmpFilePath)){

                $file = fopen($tmpFilePath, "r");

                while (!feof($file)){

                    $message = fgets($file);
    
                    if (!empty($message)){
    
                        $messages[] = $message;
    
                    }
    
                }
    
                fclose($file);

                var_dump("Закрыли файл");
    
                foreach ($messages as $key => $value) {
					$message = explode(';', $value);
					$message = array_map('trim', $message);

					$date = isset($message[0]) ? $message[0] : '';
					$name = isset($message[1]) ? $message[1] : '';
					$email = isset($message[2]) ? $message[2] : '';
					$comment = isset($message[3]) ? $message[3] : '';

                    $this -> setDate($date);
                    $this -> setFio($name);
                    $this -> setEmail($email);
                    $this -> setInfo_message($comment);
                    $this -> save();

                }

                var_dump("Все сохранили в БД");

            }

        }

    }

?>