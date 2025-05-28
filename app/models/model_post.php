<?php

    require_once 'app/core/base_active_record.php';

    class Model_post extends BaseActiveRecord{

        protected static $tableName = "post";

        public $title_post;
        public $photo;
        public $info_post;
        private $date;

        public function setTitlePost($title_post) { $this->title_post = $title_post; }
        public function getTitlePost() { return $this->title_post; }

        public function setPhoto($photo) { $this->photo = $photo; }
        public function getPhoto() { return $this->photo; } 

        public function setInfoPost($info_post) { $this->info_post = $info_post; }
        public function getInfoPost() { return $this->info_post; }

        public function setDate($date){$this->date = $date;}
        public function getDate(){return $this->date;}

    }

?>