<?php

// CHECK IF CURRENT USER IS A ADMIN/MANAGER 

//session_start();  

if (!isset( $_SESSION['role']) || $_SESSION['role'] <= 3) {
	
	header("Location: ../../index.php"); 

}

?>
