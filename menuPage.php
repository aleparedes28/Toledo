<?php 

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'db_toledo');

$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

if($conn === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

$sql = "SELECT * FROM users";

$result = $conn->query($sql);

?>

<!DOCTYPE html>

<html>

<head>

    <title>Menu page</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">

</head>

<body>

    <div class="container">

        <h2>Welcome to home page</h2>

<table class="table">

    <thead>

        <tr>

        <th>Action</th>

        <th>Create</th>

    </tr>

    </thead>

    <tbody> 

        <?php

            if ($result->num_rows > 0) {

                while ($row = $result->fetch_assoc()) {

        ?>

                    <tr>

                    <td><a class="btn btn-info" href="update.php?id=<?php echo $row['id']; ?>">Edit Username</a>&nbsp;<a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                    
                    <td><a class="btn btn-info" href="create.php?id=<?php echo $row['id']; ?>">Create new username</a>&nbsp;
                    </tr>                       

        <?php       }

            }

        ?>                

    </tbody>

</table>

    </div> 

</body>

</html>