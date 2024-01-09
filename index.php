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
</head>


<body>
  <?php

  foreach ($hotels as $index => $hotel) {
    // variabile per indicare numero hotel partendo da 1
    $numero_hotel = ++$index;
    echo "Hotel N° $numero_hotel";
    echo "<br>";
    foreach ($hotel as $key => $value) {

      // mostriamo yes or no per il caso chiave parking al posto di 1 o vuoto per true false
      // primo modo
      // if ($key== 'parking') {
      //   echo "$key: $value";
      // } else {
      //   $parking_str = $value === true ? 'Yes' : 'No';
      //   echo "$key: $parking_str";
      // }

      // secondo modo più generico
      if (is_bool($value)) {
        $parking_str = $value ? 'Yes' : 'No';
        echo "$key: $parking_str";
      } else {
        echo "$key: $value";
      }

      echo "<br>";
    }
    echo '<hr>';
  }

  ?>
</body>

</html>