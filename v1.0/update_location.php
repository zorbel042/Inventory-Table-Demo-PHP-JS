<?php

require('../php-files/db_connect.php');

$id = mysqli_real_escape_string($connection, $_POST['id']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$city = mysqli_real_escape_string($connection, $_POST['city']);
$state = mysqli_real_escape_string($connection, $_POST['state']);

$query = " UPDATE `stores` SET
           name = '$name',
           city = '$city',
           state = '$state'
           WHERE id = $id ";

$run = mysqli_query($connection, $query);

header('Location: home.php');
 
?>
