<div class="container my-5">
  <h1>Elenco insegnati</h1>

  <?php if($result && $result->num_rows > 0): ?>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nome e Cognome</th>
          <th scope="col">Ufficio</th>
          <th scope="col">Telefono</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach($teachars_data as $teacher):  ?>
        <tr>
          <td><?php echo $teacher->id ?></td>
          <td><?php echo $teacher->getFullName() ?></td>
          <td><?php echo $teacher->getOfficeInfo() ?></td>
          <td><?php echo $teacher->phone ?></td>
        </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
    <?php else: ?>
      <h2>Nessun risultato</h2>
  <?php endif; ?>

</div>