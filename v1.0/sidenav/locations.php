<?php

session_start();
include "../../php-files/db_connect.php";

  $add = false;
  $edit = false;
  $delete = false;

  $store = $_SESSION['stores_ID'];
  $query = "";
  $result = "";

  if ($_SESSION['isDOW'] == 1 && $_SESSION['role'] == 5) {

    $add = true;
    $edit = true;
    $delete = true;

    $query = "SELECT * FROM stores ORDER BY name";

  } else {
    echo "<div class='content-header'><h2 style='color:red;'>Warning! </h2> Check your db settings if you are getting an error</div>";

  }

  $result = mysqli_query($connection, $query);

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Locations</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="../v1.0/home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#" onclick="loadPage('sidenav/admin.php');">Admin</a></li>
          <li class="breadcrumb-item active">Locations</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <section class="content">
    <div class="card">
      <div class="card-body">

        <table class="table table-bordered">

          <thead>
            <tr>
              <th>Name</th>
              <th>City</th>
              <th>State</th>

              <?php
                if ($edit && $delete) {
                  echo "<th>Edit</th>";
                  echo "<th>Delete</th>";
                }
              ?>

            </tr>
          </thead>
          <tbody>

            <?php

          for ($i=0; $i < mysqli_num_rows($result); $i++) {

              $row = mysqli_fetch_array($result);


                $displayLocation = "";

                $displayLocation .= "<tr>";
                $displayLocation .= "<td>".$row['name']."</td>";
                $displayLocation .= "<td>".$row['city']."</td>";
                $displayLocation .= "<td>".$row['state']."</td>";

                if ($edit && $delete) {

                  $displayLocation .= "<td><center><button class='btn btn-primary' onclick='editLocation(".$row['id'].");'>Edit</button></center></td>";
                  $displayLocation .= "<td><center><button class='btn btn-danger' onclick='deleteLocation(".$row['id'].");'>Delete</button></center></td>";

                }

                $displayLocation .= "</tr>";

                echo $displayLocation;

              }

            ?>

          </tbody>

        </table>
        <?php if ($add) { ?>
          <br>
          <div class="row">
            <div class="col-12">
              <button class="btn btn-success float-right" onclick="loadPage('pages/new_location.php')">Add a Location</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </section>
</div>
