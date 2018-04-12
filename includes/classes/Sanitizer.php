<?php


class Sanitizer {

    private $sanitizedData = array();

    public function __construct($formData){
        $this->sanitizedData = $formData;
    }

    public function sanitize($rules){

        //echo "<br><br>";
        foreach($rules as $field => $rule){

          // echo "***{$field} rule's=> {$rule }" . "</br>";
            switch($rule){
                case 'string':
                    $this->sanitizedData[$field] = filter_var($this->sanitizedData[$field],FILTER_SANITIZE_STRING);
                    break;
                case 'email':
                    $this->sanitizedData[$field] = filter_var($this->sanitizedData[$field],FILTER_SANITIZE_EMAIL);
                    break;

            }
        }

        return $this->sanitizedData;
    }
}
