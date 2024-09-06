<?php
require_once __DIR__ . '/utils/conn.php';
require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Models/Student.php';

$sql = "SELECT * FROM students LIMIT 10";
$result = $conn->query($sql);

$studets_data = [];

if($result && $result->num_rows > 0){
  // output data of each row
  while($row = $result->fetch_object()){
    $studets_data[] = new Student(
                      $row->id, 
                      $row->name, 
                      $row->surname, 
                      $row->email, 
                      $row->enrolment_date, 
                      $row->date_of_birth, 
                      $row->registration_number, 
                      $row->fiscal_code);
  }
}



include __DIR__ . '/views/partials/head.php';
include __DIR__ . '/views/partials/header.php';


include __DIR__ . '/views/pages/students.php';


include __DIR__ . '/views/partials/footer.php';