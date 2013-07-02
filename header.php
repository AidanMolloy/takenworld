<?php 
include("functions.php");
connect();
include("user_stats.php");
?>
<html>
  <head>
    <title>Taken World</title>
    <link href="style.css" rel="stylesheet" type="text/css"/>
  </head>
  <body>
    <div id="header"><center>Taken World</center></div>
     <?php
      if(isset($_SESSION['uid'])){
        include("safe.php");
        include("update_stats.php")?> 
   
    
    <div id="infobar">
    
    &nbsp; <div id="yourrank"><?php echo "$rrank" ?></div> &nbsp; 
    &nbsp; <div id="username"><?php echo $user['username']; ?></div> &nbsp;
    <div id="yourenergy"> &nbsp; <b> <?php echo $stats['energy']; ?> / 100 Energy </b> &nbsp; </div>
    <div id="yourgold"> &nbsp; <b> <img src="images/gold_icon1.png" alt="Logo" width="22" height="21"  title="Gold"/><?php echo number_format($stats['gold']); ?> + <?php echo number_format($income); ?> Per Turn </b> &nbsp;</div>
    <div id="yourfood"> &nbsp; <b> <img src="images/food_icon.png" alt="Logo" width="27" height="23"  title="food"/><?php echo number_format($stats['food']); ?> + <?php echo number_format($farming); ?> Per Turn </b> &nbsp;</div>
    <div id="yourcapacity"> &nbsp; <b> Capacity: <?php echo number_format($capacity); ?> </b> &nbsp;</div>
    </div>
    
    <div id="navigationbar">
        &nbsp; <a href ="main.php">Your Profile</a> &nbsp;
        &nbsp; <a href ="rankings.php">Rankings</a> &nbsp;
        &nbsp; <a href ="units.php">Units</a> &nbsp;
        &nbsp; <a href ="buildings.php">Buildings</a> &nbsp;
        &nbsp; <a href ="inventory.php">Inventory</a> &nbsp;
        &nbsp; <a href ="news.php">News</a> &nbsp;
        <a href ="logout.php"><div id="logout">Logout</div></a>
    </div>   
    
    <?php } ?>
    <div id="container">
      
      <?php
      if(isset($_SESSION['uid'])){
        include("safe.php");
      }else{
      ?>
        <div id="navigation">
        <p>
        <form action="login.php" method="post">
        &nbsp; Username: <input type="text" name="username"/><br />
        &nbsp; Password: <input type="password" name="password"/>
        <input type="submit" name="login" value="Login"/>
        </form>
        </p>
        &raquo; <a href ="register.php">Register For Free!</a>
        </div>
      <?php
      }
      if(isset($_SESSION['uid'])){
	  }?>
      
      <div id="content"><div id="con_div">
      
