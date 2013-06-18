<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])) {
  echo "You must be logged in to view this page";
}else{ 
  if(isset($_POST['train'])) {
    $soldier = protect($_POST['soldier']);
    $ranger = protect($_POST['ranger']);
    $food_needed = (10 * $soldier) + (18 * $ranger);
    if($soldier < 0 || $ranger < 0) {
      output("You must train a positive number of Units.");
    }elseif($stats['food'] < $food_needed) {
      output("You do not have enough food.");
    }else{
      $unit['soldier'] += $soldier;
      $unit['ranger'] += $ranger;
      
      $update_unit = mysql_query("UPDATE `unit` SET 
                                  `soldier`='".$unit['soldier']."', 
                                  `ranger`='".$unit['ranger']."' 
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['food'] -= $food_needed;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
                                  
                                  
      include("update_stats.php");
      output("You have trained your Units!");
    }
  }elseif(isset($_POST['untrain'])) {
    $soldier = protect($_POST['soldier']);
    $ranger = protect($_POST['ranger']);
    $food_gained = (8 * $soldier) + (13 * $ranger);
    if($soldier < 0 || $ranger < 0) {
      output("You must untrain a positive number of Units.");
    }elseif($soldier > $unit['soldier'] || $ranger > $unit['ranger']) {
      output("You do not have that many Units to untrain.");
    }else{
      $unit['soldier'] -= $soldier;
      $unit['ranger'] -= $ranger;
      
      $update_unit = mysql_query("UPDATE `unit` SET 
                                  `soldier`='".$unit['soldier']."', 
                                  `ranger`='".$unit['ranger']."' 
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      $stats['food'] += $food_gained;
      $update_food = mysql_query("UPDATE `stats` SET `food`='".$stats['food']."'
                                  WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      include("update_stats.php");
      output("You have untrained your Units!");
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
      <td><b>Train More</b></td>
    </tr>
    <tr>
      <td>Soldier</td>
      <td><?php  echo number_format($unit['soldier']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>10</td>
      <td><input type="text" name="soldier" /></td>
    </tr>
    <tr>
      <td>Ranger</td>
      <td><?php  echo number_format($unit['ranger']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>18</td>
      <td><input type="text" name="ranger" /></td>
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
      <td><b>Untrain More</b></td>
    </tr>
    <tr>
      <td>Soldier</td>
      <td><?php  echo number_format($unit['soldier']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>8</td>
      <td><input type="text" name="soldier" /></td>
    </tr>
    <tr>
      <td>Ranger</td>
      <td><?php  echo number_format($unit['ranger']); ?></td>
      <td><img src="images/food_icon.png" alt="Logo" width="27" height="24"  title="Food"/>13</td>
      <td><input type="text" name="ranger" /></td>
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