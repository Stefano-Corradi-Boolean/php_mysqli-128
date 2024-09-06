<?php

class User{
  public $id;
  public $name;
  public $surname;
  public $email;

  public function __construct(int $_id, string $_name, string $_surname, string $_email){
    $this->id = $_id;
    $this->name = $_name;
    $this->surname = $_surname;
    $this->email = $_email;
  }

  public function getFullName(){
    return $this->name . ' ' . $this->surname;
  }
}