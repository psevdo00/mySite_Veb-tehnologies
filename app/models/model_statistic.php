<?php

    require_once 'app/core/base_active_record.php';

    class Model_statistic extends BaseActiveRecord{
        protected static $tableName = 'statistics';
        protected static $fields = array();

        public $time_statistic;
        public $web_page;
        public $ip_address;
        public $host_name;
        public $browser_name;

        function save_statistic($page){

            $this->time_statistic = date('Y-m-d h:m:s');
            $this->web_page = $page;
            $this->ip_address = $_SERVER['REMOTE_ADDR'];
            $this->host_name = gethostbyaddr($_SERVER['REMOTE_ADDR']);
            $this->browser_name = $_SERVER['HTTP_USER_AGENT'];
            $this->save();

        }

        public function setTimeStatistic($time_statistic) { $this->time_statistic = $time_statistic; }
        public function getTimeStatistic() { return $this->time_statistic; }

        public function setWebPage($web_page) { $this->web_page = $web_page; }
        public function getWebPage() { return $this->web_page; } 

        public function setIpAddress($ip_address) { $this->ip_address = $ip_address; }
        public function getIpAddress() { return $this->ip_address; }

        public function setHostName($host_name){$this->host_name = $host_name;}
        public function getHostName(){return $this->host_name;}

        public function setBrowserName($browser_name){$this->browser_name = $browser_name;}
        public function getBrowserName(){return $this->browser_name;}

        public function get_all_statistic(){

            return $this -> findAll();

        }

    }

?>