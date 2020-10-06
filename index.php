<?php

include "php-files/session_authenticate.php";
include "php-files/db_connect.php";

// just to avoid file routing issues we are placing it here
// function countRequests(){

//   if (file_exists("./../php-files/db_connect.php"))
//   {
//       include("./../php-files/db_connect.php");
//   } else if (file_exist("../php-files/db_connect.php")) {
//       include("../php-files/db_connect.php");
//   } else {
//       include("../../php-files/db_connect.php");
//   }

//   $transporter_ID = $_SESSION['userID'];
//   $query = "SELECT requests.id, requests.status, requests.vin, requests.year, requests.make, requests.model, requests.ro, users.fullName FROM requests INNER JOIN users ON requests.requestedBy=users.id WHERE requests.transporter_ID = $transporter_ID";

//   $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
//   $count = mysqli_num_rows($result);
//   return $count;
// }
$username = "Admin";
$password = "1234";

// CHECK FOR THE RECORD FROM TABLE
$query = "SELECT * FROM `users` WHERE username like '$username' and password='$password'";

// $query = "SELECT * FROM demo_table";
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);

if ($count >= 1){ 

	// session_start();

	$row = mysqli_fetch_array($result);

	// CREATES SESSION VARIABLES 

	$_SESSION['userID'] = $row['id'];
	$_SESSION['username'] = $row['username'];
	$_SESSION['fullName'] = $row['fullName'];
	$_SESSION['SMS'] = $row['SMS'];
	$_SESSION['email'] = $row['email'];
}
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>E-Com 1.0</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="v1.0/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="v1.0/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="v1.0/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="v1.0/plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="v1.0/dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="v1.0/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="v1.0/plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="v1.0/plugins/summernote/summernote-bs4.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="css/style1.css">

</head>

<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">

    <!-- Header Menu -->
    <?php include "v1.0/header.php"; ?>

    <!-- Side Bar Menu -->
    <?php include "v1.0/sidenav.php"; ?>


    <div id="main_content" class="content-wrapper">

      <!-- Main Content Goes Here -->
      <!-- loadPage() Changes the Data in Here -->

    </div>


    <?php include "v1.0/footer.php" ?>

  </div>

  <script type="text/javascript">

      // AJAX REQUESTS
      function loadPage(newPage) {
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById("main_content").innerHTML =
                this.responseText;
            }
        };
        xhttp.open("GET", newPage, true);
        xhttp.send();
      }

      // Function to Show Detailed Modal View on Request Click
      function getStatus(id) {

        $.get("pages/view_request.php?rID=" + id, function(data) {
          $('#modal-xl').modal({show:true});
          $("#modal-xl-data").html(data);
        });

      }

      // Function to Show Rating Modal View on Rate Click

      
      function editLocation(userID) {
        loadPage("v1.0/pages/edit_locations.php?id=" + userID);
      }

      function deleteLocation(id) {

        if (confirm("Are you sure you want to delete this Location?")) {
          loadPage("v1.0/delete_location.php?id=" + id);
        } else {
          event.preventDefault();
        }


        //INVENTORY!!!

      }
      function editInventory(id) {
        loadPage("v1.0/pages/edit_inventory_item_quantity.php?id=" + userID);
      }

      function deleteInventoryQuantity(id) {
        loadPage("v1.0/delete_inventory_item_quantity.php?id=" + id);
        Swal.fire({
          title: 'Success!',
          text: 'Quantity has been updated',
          icon: 'success',
          confirmButtonText: 'Cool'
        })

      }

      function deleteInventoryItem(id) {
        loadPage("v1.0/delete_inventory_item.php?id=" + id);
        Swal.fire({
          title: 'Success!',
          text: 'Quantity has been updated',
          icon: 'success',
          confirmButtonText: 'Cool'
        })

      }
      function addInventory(id) {
        loadPage("v1.0/pages/add_inventory_item_quantity.php?id=" + id);
        Swal.fire({
          title: 'Success!',
          text: 'Quantity has been updated',
          icon: 'success',
          confirmButtonText: 'Cool'
        })

      }

      // Validation of Location Function Begin Here
      function validateLocation (formName) {

        var storeName      = document.getElementById("storeName");
        var storeNameError = document.getElementById("storeNameError");

        var city      = document.getElementById("city");
        var cityError = document.getElementById("cityError");

        var state      = document.getElementById("state");
        var stateError = document.getElementById("stateError");

        var pass = true;


        if (storeName.value == "") {
          storeName.classList.add("is-invalid");
          storeNameError.innerHTML = "Store Name is Required";
          pass = false;
        } else {
          storeName.classList.remove("is-invalid");
          storeNameError.innerHTML = "";
        }


        if (city.value == "") {
          city.classList.add("is-invalid");
          cityError.innerHTML = "City is Required";
          pass = false;
        } else {
          city.classList.remove("is-invalid");
          cityError.innerHTML = "";
        }


        if (state.value == "Select") {
          state.classList.add("is-invalid");
          stateError.innerHTML = "State is Required";
          pass = false;
        } else {
          state.classList.remove("is-invalid");
          stateError.innerHTML = "";
        }

        if (pass) {
          if (formName == 'new') {
            document.getElementById("new_location").submit();
          } else {
            document.getElementById("edit_location").submit();
          }
        }

      }


    function validateInventoryItem (formName) {

      var itemName      = document.getElementById("itemName");
      var itemNameError = document.getElementById("itemNameError");

      var price      = document.getElementById("price");
      var priceError = document.getElementById("priceError");

      var itemCode      = document.getElementById("itemCode");
      var itemCodeError = document.getElementById("itemCodeError");

      var category      = document.getElementById("category");
      var categoryError = document.getElementById("categoryError");

      var quantity      = document.getElementById("quantity");
      var quantityError = document.getElementById("quantityError");

      var pass = true;


      if (itemName.value == "") {
        itemName.classList.add("is-invalid");
        itemNameError.innerHTML = "Item Name is Required";
        pass = false;
      } else {
        itemName.classList.remove("is-invalid");
        itemNameError.innerHTML = "";
      }


      if (price.value == "") {
        price.classList.add("is-invalid");
        priceError.innerHTML = "Price is Required";
        pass = false;
      } else {
        price.classList.remove("is-invalid");
        priceError.innerHTML = "";
      }


      if (itemCode.value == "Select") {
        itemCode.classList.add("is-invalid");
        itemCodeError.innerHTML = "Item Code is Required";
        pass = false;
      } else {
        itemCode.classList.remove("is-invalid");
        itemCodeError.innerHTML = "";
      }

      if (category.value == "Select") {
        category.classList.add("is-invalid");
        categoryError.innerHTML = "Category is Required";
        pass = false;
      } else {
        category.classList.remove("is-invalid");
        categoryError.innerHTML = "";
      }

      if (quantity.value == "Select") {
        quantity.classList.add("is-invalid");
        quantityError.innerHTML = "Quantity is Required";
        pass = false;
      } else {
        quantity.classList.remove("is-invalid");
        quantityError.innerHTML = "";
      }


      if (pass) {
        if (formName == 'new') {
          document.getElementById("new_inventory_item").submit();
        } else {
          document.getElementById("edit_inventory_item_quantity").submit();
        }
      }

      

}

  </script>

<!-- ################################################### -->
<!-- <script src="iconic.min.js"></script> -->

<!-- jQuery -->
<script src="v1.0/plugins/jquery/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="v1.0/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button)
</script>

  
<!-- Bootstrap 4 -->
<script src="v1.0/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="v1.0/plugins/chart.js/Chart.min.js"></script>
<!-- Sparkline -->
<script src="v1.0/plugins/sparklines/sparkline.js"></script>
<!-- JQVMap -->
<script src="v1.0/plugins/jqvmap/jquery.vmap.min.js"></script>
<script src="v1.0/plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
<!-- jQuery Knob Chart -->
<script src="v1.0/plugins/jquery-knob/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="v1.0/plugins/moment/moment.min.js"></script>
<script src="v1.0/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="v1.0/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
<!-- Summernote -->
<script src="v1.0/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="v1.0/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="v1.0/dist/js/adminlte.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="v1.0/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="v1.0/dist/js/demo.js"></script>

<!-- Sweet Alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

<!-- Runs loadPage() to show Queue Immediately on Load -->
<script>

  <?php echo "loadPage('v1.0/sidenav/inventory.php')"; ?>

</script>


</body>
</html>
