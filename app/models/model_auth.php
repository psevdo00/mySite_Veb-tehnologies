<?php

    require_once 'app/core/base_active_record.php';

    class Model_auth extends BaseActiveRecord{

        protected static $tableName = "user";

        public $fio;
        public $email;
        public $login;
        public $passwords;

        public function setFio($fio) { $this->fio = $fio; }
        public function getFio() { return $this->fio; }

        public function setEmail($email) { $this->email = $email; }
        public function getEmail() { return $this->email; } 

        public function setLogin($login) { $this->login = $login; }
        public function getLogin() { return $this->login; }

        public function setPasswords($passwords){$this->passwords = $passwords;}
        public function getPasswords(){return $this->passwords;}

        public function save_user_in_database($data){

            $this -> setFio($data["fio"]);
            $this -> setEmail($data["email"]);
            $this -> setLogin($data["login"]);
            $this -> setPasswords($data["password"]);

            $this -> save();

        }

    }

?>