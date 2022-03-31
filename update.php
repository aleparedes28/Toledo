<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_toledo');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

    if (isset($_POST['update'])) {

        $name = $_POST['name'];

        $user_id = $_POST['user_id'];

        $key = $_POST['key'];

        $password = $_POST['password'];

        $sql = "UPDATE `users` SET `name`='$name',`password`='$password', `key`='$key' WHERE `id`=$user_id"; 

        $result = $conn->query($sql); 

        if ($result == TRUE) {

            echo "Record updated successfully.";

        }else{

            echo "Error:" . $sql . "<br>" . $conn->error;

        }

    } 

if (isset($_GET['id'])) {

    $user_id = $_GET['id']; 

    $sql = "SELECT * FROM `users` WHERE `id`='$user_id'";

    $result = $conn->query($sql); 

    if ($result->num_rows > 0) {        

        while ($row = $result->fetch_assoc()) {

            $name = $row['name'];

            $password  = $row['password'];

            $key = $row['key'];

            $id = $row['id'];

        } 

    ?>

        <h2>User Update </h2>

        <form action="" method="post">

          <fieldset>

            <legend>Personal information:</legend>

            Nombre:<br>

            <input type="text" required="required" name="name" value="<?php echo $name; ?>">

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            Password:<br>

            <input type="password" required="required" name="password" value="<?php echo $password; ?>">

            <br>

            <br><br>

            Key:<br>

            <input type="text" required="required" name="key" value="<?php echo $key; ?>">

            <br>
            ID:<br>

            <input type="hidden" name="user_id" value="<?php echo $id; ?>">

            <br>

            <br><br>

            <input type="submit" value="Update" name="update">
            
          </fieldset>

        </form> 

        </body>

        </html> 

    <?php

    } else{ 

        header('Location: view.php');

    } 

}

?> 