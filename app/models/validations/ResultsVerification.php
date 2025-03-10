<?php

    class ResultsVerification extends FormValidation{

        protected $rules = ['requered', 'is_integer', 'is_less', 'is_greater', 'is_email', 'regex', 'ask1', 'ask_2_and_3'];

        protected $error = [];

        protected $messages = [

            'requered' => "Поле :fieldname: обязательно!",
            'regex' => "Поле :fieldname: не соответствует шаблону!",
            'ask1' => "Ответ не верный! Правильный ответ: :relevalue:",
            'ask_2_and_3' => "Ответ не верный! Правильный ответ: :relevalue:",

        ];

        public function verificate($data = [], $rules = []){

            return $this -> validate($data, $rules);

        }

        public function ask1($value, $rule_value){

            return $value == $rule_value;

        }

        public function ask_2_and_3($value, $rule_value) {

            return strcmp(mb_strtolower($value), $rule_value) === 0;

        }

    }

?>