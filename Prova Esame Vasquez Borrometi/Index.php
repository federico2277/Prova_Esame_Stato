<!DOCTYPE html>
<html>
<head>
<?php
    $host = "localhost";
    $root = "root";    
    $pass = "Federico22giulia";
    $db = "Prova_Esame";
    
    $connessione = mysqli_connect ($host, $root, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
?>
</head>
<body>
<h1>Login</h1>
<form action="index.php" method="POST">
  <label for="fname">Inserisci codice Fiscale</label><br>
  <input type="text" name="C_F"><br>
  <label for="lname">Inserisci password</label><br>
  <input type="text" name="password"><br><br>
  <input type="submit" value="Invia">
</form> 
<?php
    if(isset($_POST['C_F'])){
    $_POST['C_F']=$C_F;
    $_POST['password']=$pass;
     $query = "SELECT C_F,Pass FROM Prova_Esame.Guardiano Where C_F = '".$C_F."' and Pass ='".$pass."';";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        header('Prova_Esame.php');
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
    }
?>
</body>
</html>

