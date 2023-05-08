<!DOCTYPE html>
<html>
<head>
<?php
    $host = "localhost";
    $root = "root";    
    $pass = "";
    $db = "Prova_Esame";
    
    $connessione = mysqli_connect ($host, $root, $pass, $db) or die("Connessione non riuscita " . mysqli_connect_error() );
?>
</head>
<body>
<h1>Login</h1>
<form action="Registrazione.php" method="POST">
  <label for="fname">Inserisci codice Fiscale</label><br>
  <input type="text" name="C_F"><br>
  <label for="fname">Inserisci il nome</label><br>
  <input type="text" name="nome_G"><br>
  <label for="fname">Inserisci il cognome</label><br>
  <input type="text" name="cognome_G"><br>
  <label for="lname">Inserisci password</label><br>
  <input type="password" name="password"><br><br>
  <select name="parco">
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
<?php
    if(isset($_POST['C_F'])){
    $C_F=$_POST['C_F'];
    $nome_G=$_POST['nome_G'];
    $cognome_G=$_POST['cognome_G'];
    $parco=$_POST['parco'];
    $pass=$_POST['password'];
     $query = "INSERT INTO `guardiano`(C_F,Nome,Cognome,Password,ID_Parco ) VALUES ('$C_F','$nome_G','$cognome_G','$pass',$parco) ";

     $result = mysqli_query ($connessione, $query) or die ("Query fallita " . mysqli_error($connessione) . " " . mysqli_errno($connessione));
     if(isset( $result)){
        header('location:Index.php');
     }else{
        echo "<h1 style='color:red;'>Hai sbaglaito l'inserimento</h1>";
     }
    }
    mysqli_close ($connessione)or die("Chiusura connessione fallita " . mysqli_error ($connessione));
?>
</body>
</html>

