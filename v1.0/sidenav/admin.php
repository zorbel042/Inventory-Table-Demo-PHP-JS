<?php

include "../../php-files/db_connect.php";
include "../../php-files/session_authenticate.php";
include "../../php-files/admin_authenticate.php";

?>
<link rel="stylesheet" type="text/css" href="../css/style1.css">

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Admin</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item active">Admin</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<br>
<br>

<div class="container">
	<div class="card-deck-wrapper">
		<div class="card-deck">

			<div class="card align-items-center" id="admincards" onclick="loadPage('sidenav/users.php')">
			  <div class="card-body" id="icons">
			  	<i class="fas fa-users fa-7x"></i>
			  </div>
			  <h3>Users</h3>
			</div>

			<?php if ($_SESSION['role'] == 5) { ?>

				<div class="card align-items-center" id="admincards" onclick="loadPage('sidenav/washers.php')">
				  <div class="card-body" id="icons">
				  	<i class="fas fa-tint fa-7x"></i>
				  </div>
				  <h3>Washers</h3>
				</div>

				<div class="card align-items-center" id="admincards" onclick="loadPage('sidenav/locations.php')">
				  <div class="card-body" id="icons">
				  	<i class="fas fa-map-marked-alt fa-7x"></i>
				  </div>
				  <h3>Locations</h3>
				</div>

			<?php } ?> 

		</div>
	</div>
</div>