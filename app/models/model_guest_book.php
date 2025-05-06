<?php

    class Model_guest_book extends Model{

        public function save_message($fio, $email, $message){

            $date = date('d.m.y H:i');
            $data = $date . "; " . $fio . "; " . $email . "; " . $message . ";\n";

            $file = fopen("txt/message.inc", 'a+');

            if ($file){

                fwrite($file, $data);

            }

            fclose($file);

        }

        public function get_data(){

            $messages = [];

            $filePath = "txt/message.inc";

            if (!file_exists($filePath)) {

                return $messages;

            }

            $file = fopen("txt/message.inc", "r");

            while (!feof($file)){

                $message = fgets($file);

                if (!empty($message)){

                    $messages[] = $message;

                }

            }

            fclose($file);

            return $messages;

        }

    }

?>