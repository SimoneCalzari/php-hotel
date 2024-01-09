<?php

$hotels = [

  [
    'name' => 'Hotel Belvedere',
    'description' => 'Hotel Belvedere Descrizione',
    'parking' => true,
    'vote' => 4,
    'distance_to_center' => 10.4
  ],
  [
    'name' => 'Hotel Futuro',
    'description' => 'Hotel Futuro Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 2
  ],
  [
    'name' => 'Hotel Rivamare',
    'description' => 'Hotel Rivamare Descrizione',
    'parking' => false,
    'vote' => 1,
    'distance_to_center' => 1
  ],
  [
    'name' => 'Hotel Bellavista',
    'description' => 'Hotel Bellavista Descrizione',
    'parking' => false,
    'vote' => 5,
    'distance_to_center' => 5.5
  ],
  [
    'name' => 'Hotel Milano',
    'description' => 'Hotel Milano Descrizione',
    'parking' => true,
    'vote' => 2,
    'distance_to_center' => 50
  ],

];

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>PHP HOTEL</title>
  <!-- BOOSTRAP -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
</head>


<body>
  <div class="container-fluid">
    <table class="table table-hover ">
      <thead class="table-info">
        <tr>
          <th scope="col" class="col-3">Nome</th>
          <th scope="col" class="col-3">Descrizione</th>
          <th scope="col" class="col-2">Parcheggio</th>
          <th scope="col" class="col-2">Voto</th>
          <th scope="col" class="col-2">Distanza dal centro</th>
        </tr>
      </thead>
      <tbody class="table-light table-group-divider">
        <?php
        foreach ($hotels as $index => $hotel) {
          // apro tag riga
          $table_row = '<tr>';
          foreach ($hotel as $key => $value) {
            // concatento i vari tag td
            //condizioni per mostrare yes or no nei valori booleani
            if (is_bool($value)) {
              $parking_str = $value ? 'Si' : 'No';
              $table_row .= "<td>$parking_str</td>";
            } else {
              $table_row .= "<td>$value</td>";
            }
          }
          // chiudo tag td
          $table_row .= '</tr>';
          // mando nell html la riga creata
          echo $table_row;
        }
        ?>
      </tbody>
    </table>

  </div>
</body>

</html>