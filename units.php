<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])) {
  echo "You must be logged in to view this page";
}else{ 
  if(isset($_POST['train'])) {
    $soldier = protect($_POST['soldier']);
    $ranger = protect($_POST['ranger']);
    $tank = protect($_POST['tank']);
    $food_needed = (10 * $soldier) + (18 * $ranger) + (15 * $tank);
    $gold_needed = (15 * $tank);
    if($soldier < 0 || $ranger < 0 || $tank < 0) {
      output("You must train a positive number of Units.");
    }elseif($stats['food'] < $food_needed) {
      output("You do not have enough food.");
    }elseif($stats['gold'] < $gold_needed) {
      output("You do not have enough gold.");
    }else{
      $unit['soldier'] += $soldier;
      $unit['ranger'] += $ranger;
      $unit['tank'] += $tank;
      
      $update_unit = mysql_query("UPDATE `unit` SET 
                                  `soldier`='".$unit['soldier']."', 
                                  `ranger`='".$unit['ranger']."',
                                  `tank`='".$unit['tank']."' 
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['food'] -= $food_needed;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                                  
      $stats['gold'] -= $gold_needed;
      $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                                  
                                  
      include("update_stats.php");
      output("You have trained your Units!");
	  
	   ?>
	   <meta http-equiv="refresh" content="2">
       <?php
	  
    }
  }elseif(isset($_POST['untrain'])) {
    $soldier = protect($_POST['soldier']);
    $ranger = protect($_POST['ranger']);
    $tank = protect($_POST['tank']);
    $food_gained = (8 * $soldier) + (13 * $ranger) + (10 * $tank);
    $gold_gained = (10 * $tank);
    if($soldier < 0 || $ranger < 0 || $tank < 0) {
      output("You must untrain a positive number of Units.");
    }elseif($soldier > $unit['soldier'] || $ranger > $unit['ranger'] || $tank > $unit['tank']) {
      output("You do not have that many Units to untrain.");
    }else{
      $unit['soldier'] -= $soldier;
      $unit['ranger'] -= $ranger;
      $unit['tank'] -= $tank;
      
      $update_unit = mysql_query("UPDATE `unit` SET 
                                  `soldier`='".$unit['soldier']."', 
                                  `ranger`='".$unit['ranger']."',
                                  `tank`='".$unit['tank']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['food'] += $food_gained;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                                  
      $stats['gold'] += $gold_gained;
      $update_gold = mysql_query("UPDATE `stats` SET `gold`='".$stats['gold']."'
      				  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      				  
      include("update_stats.php");
      output("You have untrained your Units!");
	  
	  	?>
	   <meta http-equiv="refresh" content="2">
       <?php
	  
    }
  }
  ?>
  <center><h2>Units</h2></center>
  <br />
  You can train and untrain your troops here.
  <br /><br />
  <form action="units.php" method="post">
  <table cellpadding="5" cellspacing="5">
    <tr>
      <td><b>Unit Type</b></td>
      <td><b>Number of Units</b></td>
      <td><b>Unit Cost</b></td>
      <td><b>Unit Stats</b></td>
      <td><b>Train More</b></td>
    </tr>
    <tr>
      <td>Soldier</td>
      <td><?php  echo number_format($unit['soldier']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>10</td>
      <td>Attack: 1 <br />
      Defence: 1</td>
      <td><input type="text" name="soldier" /></td>
    </tr>
    <tr>
      <td>Ranger</td>
      <td><?php  echo number_format($unit['ranger']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>18</td>
      <td>Attack: 3<br />
Defence: 1</td>
      <td><input type="text" name="ranger" /></td>
    </tr>
    <tr>
      <td>Tank</td>
      <td><?php  echo number_format($unit['tank']); ?></td>
      <td>
      <img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>15
      <img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/>15
      </td>
      <td>Attack: 2 <br />
      Defence: 4</td>
      <td><input type="text" name="tank" /></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" name="train" value="Train" /></td>
    </tr>
  </table>
  </form>
  <hr />
    <form action="units.php" method="post">
  <table cellpadding="5" cellspacing="5">
    <tr>
      <td><b>Unit Type</b></td>
      <td><b>Number of Units</b></td>
      <td><b>Food Gained</b></td>
      <td><b>Unit Stats</b></td>
      <td><b>Untrain More</b></td>
    </tr>
    <tr>
      <td>Soldier</td>
      <td><?php  echo number_format($unit['soldier']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>8</td>
      <td>Attack: 1<br />
Defence: 1</td>
      <td><input type="text" name="soldier" /></td>
    </tr>
    <tr>
      <td>Ranger</td>
      <td><?php  echo number_format($unit['ranger']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>13</td>
      <td>Attack: 3 <br />
      Defence: 1</td>
      <td><input type="text" name="ranger" /></td>
    </tr>
    <tr>
      <td>Tank</td>
      <td><?php  echo number_format($unit['tank']); ?></td>
      <td>
      <img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>10
      <img src="images/gold_icon1.png" alt="Logo" width="22" height="22"  title="Gold"/>10
      </td>
      <td>Attack: 2 <br />
      Defence: 4</td>
      <td><input type="text" name="tank" /></td>
    </tr>
    <tr>
    <td></td>
    <td></td>
    <td></td>
    <td><input type="submit" name="untrain" value="Untrain" /></td>
    </tr>
  </table>
  </form>
  <?php
}

include("footer.php");
?>
