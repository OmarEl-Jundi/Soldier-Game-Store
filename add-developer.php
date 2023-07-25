<H1>Add a new Developer to the Database</H1>
<form method="post" action="" enctype="multipart/form-data">
    <p>Name: <input type="text" name="name"></p>
    <p>Description: <input type="text" name="desc"></p>
    <p><input type="submit" name="sb" value="insert"></p>
    <p><input type="reset" value="clear all"></p>
</form>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    require 'connection.php';
    $name = $_POST['name'];
    $desc = mysqli_real_escape_string($con, $_POST['desc']);

    if (empty($name)) {
        echo "Please Enter The Name";
    }else if (empty($desc)) {
        echo "Please add a description";
    } else {
        $query = "INSERT INTO `Developer` (`name`, `description`) VALUES ('$name','$desc')";

        if (mysqli_query($con, $query)) {
            echo "The Developer $name is successfully added";
        } else {
            echo "Error executing query: " . mysqli_error($con);
        }
    }
}

?>
<p><a href="list-games.php">Show all Games</a></p>
<p><a href="admin-home.php">Go Back to Main Menu</a></p>