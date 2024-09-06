<?php

require_once __DIR__ . '/User.php';

class Teacher extends User{
    public $office_address;
    public $office_number;
    public $phone;

    public function __construct(
                            int $_id, 
                            string $_name, 
                            string $_surname, 
                            string $_email,
                            string $_office_address,
                            string $_office_number,
                            string $_phone = null
                            ){
        
        parent::__construct($_id, $_name, $_surname, $_email);
        $this->office_address = $_office_address;
        $this->office_number = $_office_number;
        $this->phone = $_phone;
        
    }

    public function getOfficeInfo(){
      return $this->office_address . ' ' . $this->office_number;
    }
}
