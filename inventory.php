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
      <h3>Soldier<br />
      <i><b><?php echo number_format($unit['soldier']); ?></h3></b></i>
    </div>
    
    <div id="inventory_box">
      <h3>Ranger<br />
      <i><?php echo number_format($unit['ranger']); ?></h3></i>
    </div>
    
     <div id="inventory_box">
      <h3>Tank<br />
      <i><?php echo number_format($unit['tank']); ?></h3></i>
    </div>
    <br />
    <br />
    <br />
    <br />
    <br />
    <br />
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
