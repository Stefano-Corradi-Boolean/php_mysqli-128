<?php
require_once __DIR__ . '/utils/conn.php';
require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Models/Teacher.php';

$sql = "SELECT * FROM teachers LIMIT 10";
$result = $conn->query($sql);

$teachars_data = [];

if($result && $result->num_rows > 0){
  // output data of each row
  while($row = $result->fetch_object()){
    $teachars_data[] = new Teacher(
                      $row->id, 
                      $row->name, 
                      $row->surname, 
                      $row->email, 
                      $row->office_address, 
                      $row->office_number, 
                      $row->phone 
        );
  }
}



include __DIR__ . '/views/partials/head.php';
include __DIR__ . '/views/partials/header.php';


include __DIR__ . '/views/pages/teachers.php';


include __DIR__ . '/views/partials/footer.php';

$conn->close();