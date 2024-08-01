<?php

$parole = ['birra', 'piscina', 'cantina'];

//var_dump($_GET);
$output = '';
//se in GET il parametro 'parola' esiste, stampa la parola cercata altrimenti non faccio nulla perche siamo al primo caricamento della pagina

if (!empty($_GET['parola'])) {
  if (in_array($_GET['parola'], $parole)) {
    $output = $_GET['parola'] . ' è presente';
  } else {
    $output = $_GET['parola'] . ' non è presente';
  }
};


//STRINGHE COLORATE: 
$pswCorretta = 'VERIFICA';

if (!empty($_GET['psw'])) {
  if ($_GET['psw'] == $pswCorretta) {
    $output = 'La password corrisponde';
    $class = 'green';
  } else {
    $output = 'La password non corrisponde';
    $class = 'red';
  }
}

//numero random? no math.floor(math.random(1, 100)*100)-1...NO! semplicemente
$numeroRandom = rand(1, 100);
echo $numeroRandom;
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous'/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .green {
      color: green;
    }
    .red {
      color: red;
    }
  </style>

  <title>Cerca Parola</title>
</head>
<body>
  
<div class="container my-5">
<!-- faccio la prima iterazione solo se il campo di ricerca è vuoto-->
  <?php if(empty($_GET['parola'])) { ?>
  <div>
    <h1>Cerca Parola</h1>
    <form action="./index.php" method="get">
      <div class="mb-3">
        <label for="exampleFormControlInput1" class="form-label">Parola da cercare</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="parola" placeholder="scrivi parola">
      </div>
      <div class="mb-3">
        <button type="submit" class="btn btn-primary">CERCA</button>
      </div>
    </form>
  </div>
  <!-- altrimenti faccio la seconda iterazione e restituisco la parola, che sia presente o meno-->
  <?php } else { ?>
    <div>
      <h1>la parola cercata è <?php echo $_GET['parola']; ?></h1>
      <p><?php echo $output; ?></p>
    </div>
    <?php } ?>
    <?php if(empty($_GET['psw'])) { ?>
      <div>
        <h1>verifica la password</h1>
        <form action="./index.php" method="get">
          <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">VERIFICA la password</label>
            <input type="text" class="form-control" id="exampleFormControlInput1" name="psw" placeholder="scrivi parola">
          </div>
          <div class="mb-3">
            <button type="submit" class="btn btn-primary">CERCA</button>
          </div>
        </form>
      </div>
      <?php }else{ ?>
        <h1 class="<?php echo $class; ?>"><?php echo $output; ?></h1>
        <?php } ?>
</div>
</body>
</html>