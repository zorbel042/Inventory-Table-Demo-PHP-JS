<?php

session_start();

include "../../php-files/db_connect.php";

if (isset($_POST['name'])) {


    $name    = mysqli_real_escape_string($connection, $_POST['name']);
    $price    = mysqli_real_escape_string($connection, $_POST['price']);
    $itemCode    = mysqli_real_escape_string($connection, $_POST['itemCode']);
    $category    = mysqli_real_escape_string($connection, $_POST['category']);
    $quantity    = mysqli_real_escape_string($connection, $_POST['quantity']);
    
    
  $query = "INSERT INTO inventory (name, price, item_code, category, in_stock) 
            VALUES ('$name', '$price', '$itemCode', '$category', '$quantity')";
  $run = mysqli_query($connection, $query);

  
   header("location: ../home.php");// routes back home... DO NOT WANT
//   header('Home: ../sidenav/inventory.php');

} else { 

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">New Item</h1> 
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#" onclick="loadPage('sidenav/admin.php');">Admin</a></li>
          <li class="breadcrumb-item"><a href="#" onclick="loadPage('sidenav/inventory.php');">Inventory</a></li> 
          <li class="breadcrumb-item active">New Item</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <form method="POST" action="pages/new_inventory_item.php" id="new_inventory_item">
    <section class="content">
      <div class="card">
        <div class="card-body">
          <div class="row bottom-padding">
            <div class="col">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="itemName" name="name" class="form-control">
                <p id="itemNameError" style="color: red; position: absolute;"></p>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>Price</label>
                <input type="text" id="price" name="price" class="form-control">
                <p id="priceError" style="color: red; position: absolute;"></p>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label>Item Code</label>
                <input type="text" id="itemCode" name="itemCode" class="form-control">
                <p id="itemCodeError" style="color: red; position: absolute;"></p>
              </div>
            </div>

            <div class="col">
              <div class="form-group">
                <label>Category</label>
                <select class="form-control custom-select" id="category" name="category" size="">
                    <option>Select</option>
                    <option value="Bicycles & Parts">Bicycles & Parts</option>
                    <option value="Sportswear & Gear">Sportswear & Gear</option>
                </select>
                <p id="categoryError" style="color: red; position: absolute;"></p>
              </div>
            </div>
          </div>
          <div class="col">
              <div class="form-group">
                <label>Quantity</label>
                <input type="text" id="quantity" name="quantity" class="form-control">
                <p id="quantityError" style="color: red; position: absolute;"></p>
              </div>
            </div>
          <div class="row">
            <div class="col-12">
              <button type="button" class="btn btn-success float-right" onclick="validateInventoryItem('new');">Submit New Item</button>
            </div>
          </div>

        </div>
      </div>
    </section>
  </form>
</div>

<?php } ?>
