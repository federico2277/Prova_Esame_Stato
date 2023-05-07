<!DOCTYPE html>
<html>
<head>
<title>Inserimento</title>
<?php
    $host = "localhost";
    $root = "root";    
    $pass = "Federico22giulia";
    $db = "Prova_Esame";
    
    $connessione = mysqli_connect ($host, $root, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
?>
</head>
<body>
<h1>Monitoraggio Parco</h1>

<form action="Flora.php" method="POST">
  <label >Inserisci il nome</label><br>
  <input type="date" name="nomeFlo "><br>
  <label >Inserisci la stagione di fioritura </label><br>
  <input type="date" name="Stagione_Fioritura  "><br><br>
  <label >Inserisci la specie </label><br>
  <input type="text" name="specie"><br><br>
  <label for="fname">Inserisci la flora</label><br>
  <input type="text" name="C_F"><br>
  <input type="submit" value="Invia">
</form> 
<a href="Fauna.php"><button>Inserisci Esemplare</button></a>
<?php
if(isset($_POST['nomeFlo'])){
    $_POST['nomeFlo']=$nomeFlo;
    $_POST['Stagione_Fioritura']=$Stagione_Fioritura;
    $_POST['specie']=$specie;
     $query = "INSERT INTO prova_esame.Peculiarità(Nome ,Stagione_Fioritura,Specie_Flora)
      VALUES ('".$nomeFlo."','".$Stagione_Fioritura."','".$specie."')";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulle peculiarita :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
     
}
?>?>

</body>
</html>


