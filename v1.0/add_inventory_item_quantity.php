<?php

session_start();

require('../php-files/db_connect.php');

if (isset($_POST['updateQty'])) {

    $quantity    = mysqli_real_escape_string($connection, $_POST['updateQty']);


    $id = mysqli_real_escape_string($connection, $_GET['id']);


    $query = "SELECT in_stock FROM inventory WHERE id = $id ";
    $qty = mysqli_query($connection, $query);
    
    
    $query = "UPDATE inventory SET in_stock=in_stock+$quantity WHERE id = $id ";
    
    $run = mysqli_query($connection, $query);
    
    
    
}
$id = mysqli_real_escape_string($connection, $_GET['id']);


$query = "SELECT in_stock FROM inventory WHERE id = $id ";
$qty = mysqli_query($connection, $query);


$query = "UPDATE inventory SET in_stock=in_stock+1 WHERE id = $id ";

$run = mysqli_query($connection, $query);



header('Location: sidenav/inventory.php');


?>
