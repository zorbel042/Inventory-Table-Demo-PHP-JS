<?php

session_start();
include "../../php-files/db_connect.php";

$id = mysqli_real_escape_string($connection, $_GET['id']);

$query = "SELECT * FROM `stores` WHERE `id` = ${id} ";
$run = mysqli_query($connection, $query);
$row = mysqli_fetch_array($run);

$id    = $row['id']; 
$name  = $row['name'];
$city  = $row['city'];
$state = $row['state'];

?>

<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0 text-dark">Edit Location</h1>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="home.php">Home</a></li>
          <li class="breadcrumb-item"><a href="#" onclick="loadPage('sidenav/admin.php');">Admin</a></li>
          <li class="breadcrumb-item"><a href="#" onclick="loadPage('sidenav/locations.php');">Locations</a></li> 
          <li class="breadcrumb-item active">Edit Location</li>
        </ol>
      </div>
    </div>
  </div>
</div>

<div class="container">
  <form method="POST" action="update_location.php" method="POST" id="edit_location">
    <input type="hidden" name="id" value="<?php echo $id ?>">
    <section class="content"> 
      <div class="card">
        <div class="card-body">
          <div class="row bottom-padding">
            <div class="col">
              <div class="form-group">
                <label>Name</label>
                <input type="text" id="storeName" name="name" class="form-control" value="<?php echo $name ?>">
                <p id="storeNameError" style="color: red; position: absolute;"></p>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>City</label>
                <input type="text" id="city" name="city" class="form-control" value="<?php echo $city ?>">
                <p id="cityError" style="color: red; position: absolute;"></p>
              </div>
            </div>
            <div class="col">
              <div class="form-group">
                <label>State</label>
                <select class="form-control custom-select" id="state" name="state" size="">
                    <option><?php echo $state ?></option>
                    <option value="Select"></option>
                    <option value="Alabama (AL)">Alabama (AL)</option>
                    <option value="Alaska (AK)">Alaska (AK)</option>
                    <option value="Arizona (AZ)">Arizona (AZ)</option>
                    <option value="Arkansas (AR)">Arkansas (AR)</option>
                    <option value="California (CA)">California (CA)</option>
                    <option value="Colorado (CO)">Colorado (CO)</option>
                    <option value="Connecticut (CT)">Connecticut (CT)</option>
                    <option value="Delaware (DE)">Delaware (DE)</option>
                    <option value="District Of Columbia (DC)">District Of Columbia (DC)</option>
                    <option value="Florida (FL)">Florida (FL)</option>
                    <option value="Georgia (GA)">Georgia (GA)</option>
                    <option value="Hawaii (HI)">Hawaii (HI)</option>
                    <option value="Idaho (ID)">Idaho (ID)</option>
                    <option value="Illinois (IL)">Illinois (IL)</option>
                    <option value="Indiana (IN)">Indiana (IN)</option>
                    <option value="Iowa (IA)">Iowa (IA)</option>
                    <option value="Kansas (KS)">Kansas (KS)</option>
                    <option value="Kentucky (KY)">Kentucky (KY)</option>
                    <option value="Louisiana (LA)">Louisiana (LA)</option>
                    <option value="Maine (ME)">Maine (ME)</option>
                    <option value="Maryland (MD)">Maryland (MD)</option>
                    <option value="Massachusetts (MA)">Massachusetts (MA)</option>
                    <option value="Michigan (MI)">Michigan (MI)</option>
                    <option value="Minnesota (MN)">Minnesota (MN)</option>
                    <option value="Mississippi (MS)">Mississippi (MS)</option>
                    <option value="Missouri (MO)">Missouri (MO)</option>
                    <option value="Montana (MT)">Montana (MT)</option>
                    <option value="Nebraska (NE)">Nebraska (NE)</option>
                    <option value="Nevada (NV)">Nevada (NV)</option>
                    <option value="New Hampshire (NH)">New Hampshire (NH)</option>
                    <option value="New Jersey (NJ)">New Jersey (NJ)</option>
                    <option value="New Mexico (NM)">New Mexico (NM)</option>
                    <option value="New York (NY)">New York (NY)</option>
                    <option value="North Carolina (NC)">North Carolina (NC)</option>
                    <option value="North Dakota (ND)">North Dakota (ND)</option>
                    <option value="Ohio (OH)">Ohio (OH)</option>
                    <option value="Oklahoma (OK)">Oklahoma (OK)</option>
                    <option value="Oregon (OR)">Oregon (OR)</option>
                    <option value="Pennsylvania (PA)">Pennsylvania (PA)</option>
                    <option value="Rhode Island (RI)">Rhode Island (RI)</option>
                    <option value="South Carolina (SC)">South Carolina (SC)</option>
                    <option value="South Dakota (SD)">South Dakota (SD)</option>
                    <option value="Tennessee (TN)">Tennessee (TN)</option>
                    <option value="Texas (TX)">Texas (TX)</option>
                    <option value="Utah (UT)">Utah (UT)</option>
                    <option value="Vermont (VT)">Vermont (VT)</option>
                    <option value="Virginia (VA)">Virginia (VA)</option>
                    <option value="Washington (WA)">Washington (WA)</option>
                    <option value="West Virginia (WV)">West Virginia (WV)</option>
                    <option value="Wisconsin (WI)">Wisconsin (WI)</option>
                    <option value="Wyoming (WY)">Wyoming (WY)</option>
                </select>
                <p id="stateError" style="color: red; position: absolute;"></p>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-12">
              <button type="button" class="btn btn-success float-right" onclick="validateLocation('update');">Update Location</button>
            </div>
          </div>

        </div>
      </div>
    </section>
  </form>
</div>
