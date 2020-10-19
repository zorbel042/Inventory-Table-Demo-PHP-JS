<?php

session_start();
include "../../php-files/db_connect.php";

  $add = true;
  $edit = true;
  $delete = true;


  $query = "SELECT * FROM inventory ORDER BY name";
  $result = mysqli_query($connection, $query);


?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Inventory</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Inventory</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
<style>
.fade {
    height:0px;
}
</style>
  <section style="margin:auto;" class="content col-md-8">
  <div class="alert alert-success alert-dismissible" style="display:none;" id="inventory-update-alert">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success!</h4>
                Inventory was updated.
              </div>
    <div class="card">
      <div class="card-body">

        <table class="table">

          <thead>
            <tr>
              <th>Item</th>
              <th>Price</th>
              <th>Quantity</th>
              <th style='text-align: center;'>Update Quantity</th>
              <th></th>
            </tr>
          </thead>
          <tbody>

          <?php

          $minus = "<img style='height:16px;width:auto;' src='css/open-iconic-master/svg/minus.svg'>";
          $plus = "<img style='height:16px;width:auto;' src='css/open-iconic-master/svg/plus.svg'>";

          for ($i=0; $i < mysqli_num_rows($result); $i++) {

              $row = mysqli_fetch_array($result);
                

                $displayLocation = "";

                $displayLocation .= "<tr style='text-align: center;'>";
                $displayLocation .= "<td style='text-align: left;'>".$row['name']."</td>";
                $displayLocation .= "<td>".$row['price']."</td>";
                $displayLocation .= "<td>".$row['in_stock']."</td>";

                if ($edit && $delete) {

                $displayLocation .= "<td><center><button class='btn' onclick='deleteInventoryQuantity(".$row['id'].");'>".$minus."</button><input style='text-align: center;' type='text' class='col-2' name='updateQty' value='1' disabled><button class='btn' onclick='addInventory(".$row['id'].");'>".$plus."</button></center></td>";
                $displayLocation .= "<td><center><button class='btn btn-danger' onclick='deleteInventoryItem(".$row['id'].");'>Delete</button></center></td>";

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
              <button class="btn btn-success float-right" onclick="loadPage('v1.0/pages/new_inventory_item.php')">Add Item</button>
            </div>
          </div>
        <?php } ?>
      </div>
    </div>

  </section>
</div>
