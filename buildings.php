<?php
session_start();
include("header.php");
include("buildinginfo.php");
include("update_stats.php");

if(!isset($_SESSION['uid'])) {
  echo "You must be logged in to view this page";
}else{ 
  if(isset($_POST['upgradeshop']) || isset($_POST['upgradefarm']) || isset($_POST['upgradewarehouse'])) {
    $shop = protect($_POST['upgradeshop']);
    $farm = protect($_POST['upgradefarm']);
	$warehouse = protect($_POST['upgradewarehouse']);
	if (isset($_POST['upgradeshop'])) {
		$gold_needed = $shopcost;
		if($buildings['shoplvl'] == 10) {
        output("The max Shop level is 10.");
		}
	}elseif(isset($_POST['upgradefarm'])) {
		$gold_needed = $farmcost;
		if($buildings['farmlvl'] == 10) {
        output("The max Farm level is 10.");
		}
	}elseif(isset($_POST['upgradewarehouse'])) {
		$gold_needed = $warehousecost;
		$food_needed = $warehousecost;
		if($buildings['warehouselvl'] == 10) {
        output("The max Warehouse level is 10.");
		}
	};
	
    if($stats['gold'] < $gold_needed) {
      output("You do not have enough gold.");
	}elseif($stats['food'] < $food_needed) {
      output("You do not have enough food.");
    }else{
     if(isset($_POST['upgradeshop'])) {
	  $buildings['shoplvl'] += 1;
	 }elseif(isset($_POST['upgradefarm'])) {
      $buildings['farmlvl'] += 1;
	 }elseif(isset($_POST['upgradewarehouse'])) {
	  $buildings['warehouselvl'] += 1;
	 };
      $update_buildings = mysql_query("UPDATE `buildings` SET 
                                  `shoplvl`='".$buildings['shoplvl']."', 
                                  `farmlvl`='".$buildings['farmlvl']."',
								  `warehouselvl`='".$buildings['warehouselvl']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['gold'] -= $gold_needed;
      $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
								  
	  $stats['food'] -= $food_needed;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      output("You have Upgraded your building!");
	    ?>
	   <meta http-equiv="refresh" content="2">
       <?php
    }
  }elseif(isset($_POST['downgradeshop']) || isset($_POST['downgradefarm']) || isset($_POST['downgradewarehouse'])) {
    $shop = protect($_POST['downgradeshop']);
    $farm = protect($_POST['downgradefarm']);
	$warehouse = protect($_POST['downgradewarehouse']);
	if ($shopcost == 0) {
		$shopcost = 39062500;	
	}elseif ($farmcost == 0) {
		$farmcost = 39062500;	
	}elseif ($warehousecost == 0) {
		$warehousecost =39062500;	
	}
	if (isset($_POST['downgradeshop'])) {
		if ($shopcost == 0) {
		$gold_gained = (39062500 / 5);
		}else{
		$gold_gained = ($shopcost / 5);	
		}
	}elseif(isset($_POST['downgradefarm'])) {
		if ($farmcost == 0) {
		$gold_gained = (39062500 / 5);
		}else{
		$gold_gained = ($farmcost / 5);	
		}	
		}elseif(isset($_POST['downgradeewarehouse'])) {
		if ($warehousecost == 0) {
		$gold_gained = (39062500 / 5);
		}else{
		$gold_gained = ($warehousecost / 5);	
		}
	};
    if(isset($_POST['downgradeshop']) && $shoplvl == 1) {
		output("The lowest Shop level is 1");
	}elseif(isset($_POST['downgradefarm']) &&  $farmlvl == 1) {
		output("The lowest Farm level is 1");
	}elseif(isset($_POST['downgradewarehouse']) && $warehouselvl == 1) {
		output("The lowest Warehouse level is 1");
    }else{
     if(isset($_POST['downgradeshop'])) {
	  $buildings['shoplvl'] -= 1;
	 }elseif(isset($_POST['downgradefarm'])) {
      $buildings['farmlvl'] -= 1;
	 }elseif(isset($_POST['downgradewarehouse'])) {
	  $buildings['warehouselvl'] -= 1;
	 };
      
      $update_building = mysql_query("UPDATE `buildings` SET 
                                  `shoplvl`='".$buildings['shoplvl']."', 
                                  `farmlvl`='".$buildings['farmlvl']."',
								  `warehouselvl`='".$buildings['warehouselvl']."'  
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['gold'] += $gold_gained;
      $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
								  
	  $stats['food'] += $food_gained;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
								  
      output("You have Downgraded your buildings!");
	    ?>
	   <meta http-equiv="refresh" content="2">
       <?php
    }
  }
  ?>
  <center><h2>Buildings</h2></center>
  <br />
  You can Upgrade and Downgrade buildings here.
  <br /><br />
  <form action="buildings.php" method="post">
  <table cellpadding="5" cellspacing="5">
    <tr>
      <td><b>Building</b></td>
      <td><b>Level of Building</b></td>
      <td><b>Building Cost</b></td>
      <td><b>Next level</b></td>
      <td><b>Upgrade</b></td>
    </tr>
    <tr>
      <td>Shop</td>
      <td><?php  echo number_format($shoplvl); ?></td>
      <td><img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/><?php echo number_format($shopcost); ?></td>
      <td><?php echo number_format($nxtlvlincome);?> Per Turn</td>
      <td><input type="submit" name="upgradeshop" value="Upgrade" /></td>
    </tr>
    <tr>
      <td>Farm</td>
      <td><?php  echo number_format($farmlvl); ?></td>
      <td><img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/><?php echo number_format($farmcost); ?></td>
      <td><?php echo number_format($nxtlvlfarming); ?> Per Turn</td>
      <td><input type="submit" name="upgradefarm" value="Upgrade" /></td>
    </tr>
    <tr>
      <td>Warehouse</td>
      <td><?php  echo number_format($warehouselvl); ?></td>
      <td>
      <img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/><?php echo number_format($warehousecost); ?>
      <img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/><?php echo number_format($warehousecost); ?>
      </td>
      <td><?php echo number_format($nxtlvlcapacity); ?> Per Turn</td>
      <td><input type="submit" name="upgradewarehouse" value="Upgrade" /></td>
    </tr>
  </table>
  </form>
  <hr />
    <form action="buildings.php" method="post">
  <table cellpadding="5" cellspacing="5">
    <tr>
      <td><b>Building</b></td>
      <td><b>Level of Building</b></td>
      <td><b>Cost Gain</b></td>
      <td><b>Downgrade</b></td>
    </tr>
    <tr>
      <td>Shop</td>
      <td><?php  echo number_format($shoplvl); ?></td>
      <td><img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/>
      <?php 
	  	if ($shopcost == 0) {
		$shopcostgain = (39062500 / 5);
		}else{
		$shopcostgain = ($shopcost / 5);	
		}
	  ?>
	  <?php echo number_format($shopcostgain); ?></td>
      <td><input type="submit" name="downgradeshop" value="Downgrade" /></td>
    </tr>
    <tr>
      <td>Farm</td>
      <td><?php  echo number_format($farmlvl); ?></td>
      <td><img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/>
        <?php 
	  	if ($farmcost == 0) {
		$farmcostgain = (39062500 / 5);
		}else{
		$farmcostgain = ($farmcost / 5);	
		}
	  ?>
	  <?php echo number_format($farmcostgain); ?></td>
      <td><input type="submit" name="downgradefarm" value="Downgrade" /></td>
    </tr>
    <tr>
      <td>Warehouse</td>
      <td><?php  echo number_format($warehouselvl); ?></td>
      <td>
      <img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/>
        <?php 
	  	if ($warehousecost == 0) {
		$warehousecostgain = (39062500 / 5);
		}else{
		$warehousecostgain = ($warehousecost / 5);	
		}
	  ?>
	  <?php echo number_format($warehousecostgain); ?>
      <img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>
	  <?php echo number_format($warehousecostgain); ?>
      </td>
      <td><input type="submit" name="downgradewarehouse" value="Downgrade" /></td>
    </tr>
  </table>
  </form>
  <?php
}
include("footer.php");
?>
