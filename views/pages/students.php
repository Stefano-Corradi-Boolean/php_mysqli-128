<div class="container my-5">
  <h1>Elenco studenti</h1>

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