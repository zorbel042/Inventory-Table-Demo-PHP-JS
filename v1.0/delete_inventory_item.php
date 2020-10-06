<?php

require('../php-files/db_connect.php');

$id = mysqli_real_escape_string($connection, $_GET['id']);


$query = "DELETE FROM inventory WHERE id = $id ";

$run = mysqli_query($connection, $query);



header('Location: sidenav/inventory.php');

?>

