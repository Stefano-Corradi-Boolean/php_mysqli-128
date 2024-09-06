<?php

require_once __DIR__ . '/Models/User.php';
require_once __DIR__ . '/Models/Student.php';

// definiamo le costanti per la connessione al database
define('DB_SERVERNAME', 'localhost:8889');
define('DB_NAME', 'db_university');
define('DB_USER', 'root');
define('DB_PASS', 'root');

try{
  // stabilire la connessione con il database
  $conn = new mysqli(DB_SERVERNAME, DB_USER, DB_PASS, DB_NAME);
}catch(Exception $e){
  echo '<h1>Errore 500! ' . $e->getMessage() . '</h1>';
  die();
}

//salviamo la query in una variabile
// $sql = "SELECT * FROM students LIMIT 10";
// $sql = "SELECT `id`, `name`, `surname`, `registration_number`
// FROM students 
// WHERE `name` LIKE 'a%'";

$start_date = '2020-01-01';
// $sql = "SELECT `id`, `name`, `surname`, `registration_number`, `enrolment_date`
// FROM `students`
// WHERE `enrolment_date` >= '" . $start_date . "'";

// preparo la query
$stmt = $conn->prepare("SELECT * FROM `students` WHERE `enrolment_date` >= ? ORDER BY `enrolment_date`");
// bind_param() mi permette di passare i parametri alla query
$stmt->bind_param('s', $start_date);
// eseguo la query
$stmt->execute();
// salvo il risultato
$result = $stmt->get_result();


// eseguiamo la query
//$result = $conn->query($sql);
// var_dump($result);
// //salvo tutti i risultati in un array
// $students = $result->fetch_all();
// // var_dump($students);
// foreach($students as $student){
//   var_dump($student[2], $student[3], '--------');
// }

//salvo tutti i risultati sigolarmente. fetch_assoc() restituisce un array associativo del prioimo risultato eliminandolo dalla lista
// $student = $result->fetch_assoc();
// var_dump($student);
// $student = $result->fetch_assoc();
// var_dump($student);
// $student = $result->fetch_assoc();
// var_dump($student);
// $student = $result->fetch_assoc();
// var_dump($student);
// $student = $result->fetch_assoc();
// var_dump($student);
// $student = $result->fetch_assoc();
// var_dump($student);

// if($result && $result->num_rows > 0){
//   // output data of each row
//   while($row = $result->fetch_assoc()){
//     echo "id: " . $row["id"] . " - Name: " . $row["name"] . " - Lastname: " . $row["surname"] . "<br>";
//   }
// }

//salvo tutti i risultati in un array di oggetti
//fetch_object() funziona come fetch_assoc() ma restituisce un oggetto
// $student = $result->fetch_object();
// var_dump($student);
// if($result && $result->num_rows > 0){
//   // output data of each row
//   while($row = $result->fetch_object()){
//     echo "id: " . $row->id . " - Name: " . $row->name . " - Lastname: " . $row->surname . "<br>";
//   }
// }


// creo la collection da ciclare in pagina
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

// var_dump($studets_data);






// alla fine ella pagina la connessione va chiusa
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
  <title>PHP MySqli</title>
</head>
<body>

<div class="container my-5">
  <h1>PHP MySqli</h1>

  <?php if($result && $result->num_rows > 0): ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome e Cognome</th>
          <th scope="col">Matricola</th>
          <th scope="col">Data iscrizione</th>
          <th scope="col">Data nascita</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($studets_data as $student):  ?>
        <tr>
          <td><?php echo $student->id ?></td>
          <td><?php echo $student->getFullName() ?></td>
          <td><?php echo $student->registration_number ?></td>
          <td><?php echo $student->getFormatEnrolmentDate() ?></td>
          <td><?php echo $student->getFormatDateOfBirth() ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  <?php else: ?>
    <h2>Nessun risultato</h2>
  <?php endif; ?>

</div>
  
</body>
</html>