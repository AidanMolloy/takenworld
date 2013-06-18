<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
  echo "You must be logged in to view this page";
}else{
  ?>
  <center><h2>Inventory</h2></center>
  <br />
    
    <div id="inventory_box">
      <h3>Soldier
      <i><b><?php echo $unit['soldier']; ?></h3></b></i>
    </div>
    
    <div id="inventory_box">
      <h3>Ranger
      <i><?php echo $unit['ranger']; ?></h3></i>
    </div>
    
    <div id="inventory_box">
      <h3>Shop level
      <i><?php echo $buildings['shoplvl']; ?></h3></i>
    </div>
    
    <div id="inventory_box">
      <h3>Farm level
      <i><?php echo $buildings['farmlvl']; ?></h3></i>
    </div>
  
  <?php
}

include("footer.php");
?>