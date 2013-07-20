<?php
include("functions.php");
connect();
include("user_stats.php");

      if(isset($_SESSION['uid'])){
        include("safe.php");
	  
$curpoints = $stats['reputation']; $currentpoints = $curpoints -= $pointsUsed; $levelpercent = round(($currentpoints/$nextlevelreq) * 100,1);
$maxenergy = 100; $currentenergy = $stats['energy']; $percent = round(($currentenergy/$maxenergy) * 100,1);
	  };
?>
<style>
.leveloutterprogressbar {
	text-align: center;
	margin-top: -23px;
	margin-left: 200px;
	height: 20px;	
	width: 100px;
	background-color: #999;
	border: solid 1px #000;
}

.outterprogressbar {
	margin-left: 445px;
	margin-top: -26px;
	height: 20px;	
	width: 100px;
	background-color: #999;
	border: solid 1px #000;
}

.levelprogress {
	height: 20px;
	margin-top: -20px;
	width: <?php echo $levelpercent ?>%;
	border-right: solid 1px #000;
    background: #ff3019; /* Old browsers */
    background: -moz-linear-gradient(top, #ff3019 0%, #cf0404 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#ff3019), color-stop(100%,#cf0404)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #ff3019 0%,#cf0404 100%); /* IE10+ */
	background: linear-gradient(to bottom, #ff3019 0%,#cf0404 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff3019', endColorstr='#cf0404',GradientType=0 ); /* IE6-9 */
}

.energyprogress {
	margin-top: -20px;
	height: 20px;
	width: <?php echo $percent ?>%;
	border-right: solid 1px #000;
	background: #fefcea; /* Old browsers */
	background: -moz-linear-gradient(top, #fefcea 0%, #f1da36 100%); /* FF3.6+ */
	background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#fefcea), color-stop(100%,#f1da36)); /* Chrome,Safari4+ */
	background: -webkit-linear-gradient(top, #fefcea 0%,#f1da36 100%); /* Chrome10+,Safari5.1+ */
	background: -o-linear-gradient(top, #fefcea 0%,#f1da36 100%); /* Opera 11.10+ */
	background: -ms-linear-gradient(top, #fefcea 0%,#f1da36 100%); /* IE10+ */
	background: linear-gradient(to bottom, #fefcea 0%,#f1da36 100%); /* W3C */
	filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#f1da36',GradientType=0 ); /* IE6-9 */
}
</style>
<html>
  <head>
    <title>Taken World</title>
    <link rel="stylesheet" media="screen and (max-width: 899px)" href="style.css" type="text/css"/>
    <link rel="stylesheet" media="screen and (min-width: 900px) and (max-width: 1349px)" href="style.css" type="text/css"/>
    <link rel="stylesheet" media="screen and (min-width: 1350px)" href="style.css" type="text/css"/>
  </head>
  <body>
    <div id="header"><center>Taken World</center></div>
     <?php
      if(isset($_SESSION['uid'])){
        include("safe.php");
        include("update_stats.php")?> 
    
  <div id="infobar">
    &nbsp; <div id="username"><?php echo $user['username']; ?></div> &nbsp;
    <div id="yourrank"><?php echo "Level: " ?></div>
    <div class="leveloutterprogressbar"><?php echo $userlevel ?><div class="levelprogress"></div></div>
    <div id="yourenergy">Energy:</div>
    <div class="outterprogressbar"><?php echo $currentenergy ?> / 100 <div class="energyprogress"></div></div>
    <div id="yourrubies"> <b> <img src="images/ruby.png" alt="Logo" width="22" height="21"  title="Ruby"/><?php echo number_format($stats['rubies']); ?> + 1 Per Turn </b> </div>
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
      
