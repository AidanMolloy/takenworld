<?php
session_start();
include("header.php");

if(!isset($_SESSION['uid'])){
  echo "You must be logged in to view this page";
}else{
  ?><br />
  <center><h2>Your Profile</h2></center>
  <br /><div id="profile">
  <table cellpadding ="4" cellspacing="4">
    <tr>
      <h3>Username:
      <i><?php echo $user['username']; ?></h3></i>
    </tr>
    
    <tr>
      <h3>Points: 
      <i><?php echo $stats['reputation']; ?></h3></i>
    </tr>
    
    </tr>
      <h3>Energy:
      <i><?php echo $stats['energy']; ?> / 100</h3></i>
    </tr>

    <tr>
      <h3><center>Gold:
      <i><?php echo $stats['gold']; ?></center></h3></i>
    </tr>
    <tr>
      <h3><center>Food:
      <i><?php echo $stats['food']; ?></center></h3></i>
    <tr>
    </table></div>
  <?php
}

include("footer.php");
?>