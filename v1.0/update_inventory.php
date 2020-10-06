<?php

require('../php-files/db_connect.php');

$id = mysqli_real_escape_string($connection, $_POST['id']);
$name = mysqli_real_escape_string($connection, $_POST['name']);
$price = mysqli_real_escape_string($connection, $_POST['price']);
$item_code = mysqli_real_escape_string($connection, $_POST['item_code']);

$query = " UPDATE `stores` SET
           name = '$name',
           price = '$price',
           item_code = '$item_code'
           WHERE id = $id ";

$run = mysqli_query($connection, $query);

header('Location: home.php');
 
?>
