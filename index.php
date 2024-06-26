<?php

// variabile per filtro parcheggio con caso di default al primo caricamento
$parcheggio_si_no = $_GET['parking'] ?? '1';
// variabile per filtro numero di stelle con caso di default al primo caricamento
$numero_stelle = intval($_GET['vote'] ?? 1);

// caso reset filtri 
if (!empty($_GET['filter_reset'])) {
  $parcheggio_si_no = '1';
  $numero_stelle = 1;
}

// elaborazione dato sul parcheggio per averlo come booleano
if ($parcheggio_si_no !== '1') {
  $parcheggio_si_no = ($parcheggio_si_no === '2') ? true : false;
}

// variabile che mi dice se ho trovato degli hotel con i filtri, inizialmente settata a false
$hotel_trovati = false;


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
  <!-- HEADER -->
  <header>
    <h1 class="text-uppercase text-center">Php hotels</h1>
  </header>
  <!-- /HEADER -->
  <!-- MAIN -->
  <main>
    <!-- FORM FILTRI-->
    <section class="mb-4">
      <div class="container-fluid">
        <form action="index.php" method="GET">
          <div class="row">
            <div class="col-2">
              <!-- FILTRO PARCHEGGIO -->
              <label for="parking" class="mb-1">Disponibilità parcheggio:</label>
              <select class="form-select mb-3" id="parking" name="parking">
                <option value="1" <?php if ($parcheggio_si_no == '1') : ?> selected <?php endif; ?>>Indifferente</option>
                <option value="2" <?php if ($parcheggio_si_no === true) : ?> selected <?php endif; ?>>Si</option>
                <option value="3" <?php if ($parcheggio_si_no === false) : ?> selected <?php endif; ?>>No</option>
              </select>
              <!-- /FILTRO PARCHEGGIO -->
            </div>
            <div class="col-2">
              <!-- FILTRO STELLE -->
              <label for="vote" class="mb-1">Numero di stelle minimo:</label>
              <select class="form-select mb-3" id="vote" name="vote">
                <option value="1" <?php if ($numero_stelle == '1') : ?> selected <?php endif; ?>>1</option>
                <option value="2" <?php if ($numero_stelle == '2') : ?> selected <?php endif; ?>>2</option>
                <option value="3" <?php if ($numero_stelle == '3') : ?> selected <?php endif; ?>>3</option>
                <option value="4" <?php if ($numero_stelle == '4') : ?> selected <?php endif; ?>>4</option>
                <option value="5" <?php if ($numero_stelle == '5') : ?> selected <?php endif; ?>>5</option>
              </select>
              <!-- /FILTRO STELLE -->
            </div>
          </div>
          <button class="btn btn-primary">Filtra</button>
          <button class="btn btn-warning" name="filter_reset" value="reset">Reset</button>
        </form>
      </div>
    </section>
    <!-- /FORM FILTRI-->
    <!-- TABELLA HOTELS -->
    <section>
      <div class="container-fluid">
        <table class="table table-hover">
          <!-- HEADER TABELLA -->
          <thead class="table-info">
            <tr>
              <th scope="col" class="col-3">Nome</th>
              <th scope="col" class="col-3">Descrizione</th>
              <th scope="col" class="col-2">Parcheggio</th>
              <th scope="col" class="col-2"> N° Stelle</th>
              <th scope="col" class="col-2">Distanza dal centro</th>
            </tr>
          </thead>
          <!-- /HEADER TABELLA -->
          <!-- BODY TABELLA -->
          <tbody class="table-light table-group-divider">
            <?php
            foreach ($hotels as $index => $hotel) {
              // condizioni filtro parcheggio e stelle
              if (($parcheggio_si_no === '1' || $parcheggio_si_no === $hotel['parking']) && $hotel['vote'] >= $numero_stelle) {
                // imposto la variabile che mi dice se ho trovato hotel a true
                $hotel_trovati = true;
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
            }
            ?>
          </tbody>
          <!-- /BODY TABELLA -->
        </table>
        <?php
        // inserisco un messaggio nella tabella nel caso la ricerca con filtri non produca risultati
        if (!$hotel_trovati) {
          echo '<p>La ricerca non ha prodotto risultati</p>';
        }
        ?>
      </div>
    </section>
    <!-- /TABELLA HOTELS -->
  </main>
  <!-- /MAIN -->

</body>

</html>