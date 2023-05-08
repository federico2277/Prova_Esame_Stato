<!DOCTYPE html>
<html>
<head>
<?php
    $host = "localhost";
    $root = "root";    
    $pass = "";
    $db = "prova_esame";
    
    $connessione = mysqli_connect ($host, $root, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
?>
</head>
<body>
<h1>Login</h1>
<form action="index.php" method="POST">
  <label for="fname">Inserisci codice Fiscale</label><br>
  <input type="text" name="C_F"><br>
  <label for="lname">Inserisci password</label><br>
  <input type="password" name="password"><br><br>
  <input type="submit" value="Invia">
</form> 
<a href="Registrazione.php">
  <button>Registrati</button>
</a>
<?php
if(isset($_POST['C_F'])){
  $C_F=$_POST['C_F'];
  $pass=$_POST['password'];
  $query = "SELECT * FROM Prova_Esame.Guardiano Where C_F = '".$C_F."' and password ='".$pass."';";

  $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        header('location:Prova_Esame.php');
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
    }
    
    mysqli_close ($connessione)or die("Chiusura connessione fallita " . mysqli_error ($connessione));
?>
</body>
</html>

