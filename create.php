<?php
define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_toledo');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

  if (isset($_POST['submit'])) {

    $name = $_POST['name'];

    $password = $_POST['password'];

    $key = $_POST['key'];

    $sql = "INSERT INTO `db_toledo`.`users` (`name`, `password`, `key`) VALUES ('$name', AES_ENCRYPT('$password', '$key'), '$key');";

    $result = $conn->query($sql);

    if ($result == TRUE) {

      echo "Created successfully.";

    }else{

      echo "Error:". $sql . "<br>". $conn->error;

    } 

    $conn->close(); 

  }

?>

<!DOCTYPE html>

<html>

<body>

<h2>Registro</h2>

<form action="" method="POST">

  <fieldset>

    <legend>Datos:</legend>

    Nombre:<br>

    <input type="text" required="required" name="name">

    <br>

    Contraseña:<br>

    <input type="password" required="required" name="password">

    <br>

    Key:<br>

    <input type="text" required="required" name="key">

    <br><br>

    <input type="submit" name="submit" value="Submit">

  </fieldset>

</form>

</body>

</html>