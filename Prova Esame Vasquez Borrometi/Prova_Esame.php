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
<h1>inserisci dati Fauna</h1>
<form action="Prova_Esame.php" method="POST">
  <label >Inserisci l'Inizio monitoraggio</label><br>
  <input type="date" name="Inizio_monitoraggio "><br>
  <label >Inserisci il nome</label><br>
  <input type="text" name="nome "><br>
  <label >Inserisci la  Fine monitoraggio </label><br>
  <input type="date" name="Fine_monitoraggio "><br><br>
  <label >Inserisci Numero cuccioli Maschi</label><br>
  <input type="number" name="N_Cuccioli_Maschio "><br><br>
  <label >Inserisci Numero cuccioli Femmine</label><br>
  <input type="number" name="N_Cuccioli_Femmine "><br><br>
  <label >Inserisci Numero Adulti Maschi</label><br>
  <input type="number" name="N_Adulti_Maschio  "><br><br>
  <label >Inserisci Numero Adulti Femmine</label><br>
  <input type="number" name="N_Adulti_Femmine "><br><br>
  <label >Parco</label><br>
  <select name="parcofauna" >
  <?php
       $query = "SELECT * FROM Prova_Esame.Parco";
       $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
       $num_righe = mysqli_num_rows($result);
        for ($i=1; $i<=$num_righe; $i++){
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID_Parco'];
        $name = $row['Nome'];
        echo "<option value='$id'>$name</option>";
        }
  ?>
  </select>
  <input type="submit" value="Invia">
</form> 
<a href="Fauna.php"><button>Inserisci Esemplare</button></a>

<?php
if(isset($_POST['Inizio_monitoraggio'])){
    $Inizio_monitoraggio=$_POST['Inizio_monitoraggio'];
    $Fine_monitoraggio=$_POST['Fine_monitoraggio'];
    $N_Cuccioli_Maschio=$_POST['N_Cuccioli_Maschio'];
    $N_Cuccioli_Femmine=$_POST['N_Cuccioli_Femmine'];
    $N_Adulti_Maschio=$_POST['N_Adulti_Maschio'];
    $N_Adulti_Femmine_POST['N_Adulti_Femmine'];
    $parco=$_POST['parcofauna'];
    $nome=$_POST['nome'];
    
     $query = "INSERT INTO prova_esame.specie (Nome, Inizio_monitoraggio, Fine_monitoraggio, N_Cuccioli_Maschio, N_Cuccioli_Femmine, N_Adulti_Femmine, N_Adulti_Maschio, ID_Parco)
      VALUES ('$nome', '$Inizio_monitoraggio', '$Fine_monitoraggio', '$N_Cuccioli_Maschio', '$N_Cuccioli_Femmine', '$N_Adulti_Femmine', '$N_Adulti_Maschio', '$parco');";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulla fauna :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
     
mysqli_close ($connessione)or die("Chiusura connessione fallita " . mysqli_error ($connessione));
}
?>
<h1>Inserisci dati per la flora</h1>
<form action="Prova_Esame.php" method="POST">
  <label >Inserisci tipo</label><br>
  <input type="text" name="tipo"><br>
  <label >Parco</label><br>
  <select name="parcoflo">
  <?php
       $query = "SELECT * FROM Prova_Esame.Parco";
       $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
       $num_righe = mysqli_num_rows($result);
        for ($i=1; $i<=$num_righe; $i++){
        $row = mysqli_fetch_assoc($result);
        $id = $row['ID_Parco' ];
        $name = $row['Nome' ];
        echo "<option value='$id'>$name</option>";
        }
  ?>
  </select>
  <input type="submit" value="Invia">
</form> 
<?php
if(isset($_POST['tipo'])){
   $tipo=$_POST['tipo'];
   $parco=$_POST['parcoflo'];
    
     $query = "INSERT INTO prova_esame.flora(Flora_tipo,ID_Parco)
      VALUES ('$tipo','$parco')";
     $result = mysqli_query($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulla fauna :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
 
mysqli_close ($connessione)or die("Chiusura connessione fallita " . mysqli_error ($connessione));    
}
?>
<a href="Flora.php">
<button>Inserisci Flora </button></a>

</body>
</html>


