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

<form action="index.php" method="POST">
  <label >Inserisci l'Inizio monitoraggio</label><br>
  <input type="date" name="Inizio_monitoraggio "><br>
  <label >Inserisci il nome</label><br>
  <input type="date" name="nome "><br>
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
  <label >Inserisci Parco</label><br>
  <input type="text" name="Parco"><br><br>
  <input type="submit" value="Invia">
</form> 
<a href="Fauna.php"><button>Inserisci Esemplare</button></a>

<?php
if(isset($_POST['Inizio_monitoraggio'])){
    $_POST['Inizio_monitoraggio']=$Inizio_monitoraggio;
    $_POST['Fine_monitoraggio']=$Fine_monitoraggio;
    $_POST['N_Cuccioli_Maschio']=$N_Cuccioli_Maschio;
    $_POST['N_Cuccioli_Femmine']=$N_Cuccioli_Femmine;
    $_POST['N_Adulti_Maschio']=$N_Adulti_Maschio;
    $_POST['N_Adulti_Femmine']=$N_Adulti_Femmine;
    $_POST['Parco']=$parco;
    $_POST['nome']=$nome;
    
     $query = "INSERT INTO prova_esame.specie (Nome, Inizio_monitoraggio, Fine_monitoraggio, N_Cuccioli_Maschio, N_Cuccioli_Femmine, N_Adulti_Femmine, N_Adulti_Maschio, ID_Parco)
      VALUES ('".$nome."', '".$Inizio_monitoraggio."', '".$Fine_monitoraggio."', '".$N_Cuccioli_Maschio."', '".$N_Cuccioli_Femmine."', '".$N_Adulti_Femmine."', '".$N_Adulti_Maschio."', '".$parco."');";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulla fauna :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
     
}

?>
<form action="index.php" method="POST">
  <label >Inserisci tipo</label><br>
  <input type="text" name="tipo"><br>
  <input type="submit" value="Invia">
</form> 
<?php
if(isset($_POST['tipo'])){
    $_POST['tipo']=$tipo;
    $_POST['Parco']=$parco;
    
     $query = "INSERT INTO prova_esame.Flora (tipo,ID_Parco)
      VALUES ('".$tipo."','".$parco."')";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        echo "<h1 style='color:green;'>Hai inserito i dati sulla fauna :)</h1>";
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
     
}
?>
<a href="Flora.php">
<button>Inserisci Flora </button></a>

</body>
</html>


