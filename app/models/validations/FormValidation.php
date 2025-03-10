<?php

    class FormValidation{

        protected $rules = ['requered', 'is_integer', 'is_less', 'is_greater', 'is_email', 'regex']; // поле (массив) для правил проверки валидности
        protected $errors = []; // поле (массив) для текстов ошибок
        protected $messages = [

            'requered' => 'Поле :fieldname: обязательно!',
            'regex' => 'Поле :fieldname: не соответствует шаблону!',
            'is_email' => 'Поле :fieldname: не содержит реальной электронной почты!',
            'is_less' => 'Возраст должен быть не меньше :relevalue:',

        ];

        public function validate($data = [], $rules = []){
            
            foreach ($data as $fieldname => $value){

                if (in_array($fieldname, array_keys($rules))) {

                    $this -> check_validator([

                        'fieldname' => $fieldname,
                        'value' => $value,
                        'rules' => $rules[$fieldname],

                    ]);

                }

            }

            return $this;

        }

        public function check_validator($field){

            foreach ($field['rules'] as $rule => $rule_value){

                if (in_array($rule, $this -> rules)) {

                    if (!call_user_func_array([$this, $rule], [$field['value'], $rule_value])) {

                        $this -> add_error_array($field['fieldname'], str_replace([':fieldname:', ':relevalue:'], [$field['fieldname'], $rule_value], $this -> messages[$rule]));

                    }

                }
            
            }

        }

        public function add_error_array($fieldname, $error){

            $this -> errors[$fieldname][] = $error;

        }

        public function show_errors(){

            return $this -> errors;

        }
        
        public function requered($value, $rule_value){ // метод проверки является ли значение data не пустым

            return !empty(trim($value));

        } 

        public function is_integer($value, $rule_value){ // метод проверки является ли значение data строковым представлением целого числа

            return is_integer($value);

        } 

        public function is_less($value, $rule_value){ // метод проверки является ли значение data строковым представлением целого числа и не меньшим, чем value

            if ($this -> is_integer($value, $rule_value) && (int)$value >= $rule_value) {
            
                return true;

            } else {

                return false;

            }

        } 

        public function is_greater($value, $rule_value){ // метод проверки является ли значение data строковым представлением целого числа и не большим, чем value

            if ($this -> is_integer($value, $rule_value) && (int)$value <= $rule_value) {
            
                return true;

            } else {

                return false;

            }

        } 

        public function is_email($value) { // метод проверки является ли значение data строковым представлением email

            return filter_var($value, FILTER_VALIDATE_EMAIL);

        }

        public function regex($value, $regex){

            return preg_match($regex, $value);

        }

    }

?>