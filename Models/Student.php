<?php

require_once __DIR__ . '/User.php';

class Student extends User{
    public $enrolment_date;
    public $date_of_birth;
    public $registration_number;
    public $fiscal_code ;

    public function __construct(
                            int $_id, 
                            string $_name, 
                            string $_surname, 
                            string $_email,
                            string $_enrolment_date,
                            string $_date_of_birth,
                            string $_registration_number,
                            string $_fiscal_code,
                            ){
        
        parent::__construct($_id, $_name, $_surname, $_email);
        $this->enrolment_date = $_enrolment_date;
        $this->date_of_birth = $_date_of_birth;
        $this->registration_number = $_registration_number;
        $this->fiscal_code = $_fiscal_code;
    }

    public function getFormatDateOfBirth(){
      $date = date_create($this->date_of_birth);
      return date_format($date, "d/m/Y");
    }

    public function getFormatEnrolmentDate(){
      $date = date_create($this->enrolment_date);
      return date_format($date, "d/m/Y");
    }
}
