<!DOCTYPE html>
<html>
<head>
<title>Inserimento</title>
<?php
    $host = "localhost";
    $root = "root";    
    $pass = "";
    $db = "Prova_Esame";
    
    $connessione = mysqli_connect ($host, $root, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
?>
</head>
<body>
<h1>Monitoraggio Parco</h1>

<form action="Flora.php" method="POST">
  <label >Inserisci il nome</label><br>
  <input type="text" name="nomeFlo "><br>
  <label >Inserisci la stagione di fioritura </label><br>
  <input type="date" name="Stagione_Fioritura  "><br><br>
  <select name="specie">
  <?php
       $query = "SELECT * FROM Prova_Esame.flora";
       $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
       $num_righe = mysqli_num_rows($result);
        for ($i=1; $i<=$num_righe; $i++){
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID_Flora'];
        $name = $row['Flora_tipo'];
        echo "<option value='$id'>$name</option>";
        }
  ?>
  </select>
  <input type="submit" value="Invia">
</form> 
<a href="Fauna.php"><button>Inserisci Esemplare</button></a>
<?php
if(isset($_POST['nomeFlo'])){
   $nomeFlo=$_POST['nomeFlo'];
   $Stagione_Fioritura=$_POST['Stagione_Fioritura'];
   $specie=$_POST['specie'];
     $query = "INSERT INTO prova_esame.Peculiarità(Nome ,Stagione_Fioritura,Specie_Flora)
      VALUES ('".$nomeFlo."','".$Stagione_Fioritura."','".$specie."')";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulle peculiarita :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
     
}

mysqli_close ($connessione)or die("Chiusura connessione fallita " . mysqli_error ($connessione));
?>

</body>
</html>


