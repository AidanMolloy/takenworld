<?php
session_start();
include("header.php");

if(isset($_POST['changecountry'])){
  $country = protect($_POST['country']);
	
	 if($country == "") {
		 output("Please fill the text field with a valid Name");
	 }elseif(strlen($country) > 20) {
		output("Country Name must be less then 20 characters");
	}elseif(strlen($country) < 4) {
		output("Country Name must have at least 4 characters");
	 }else{
		$register1 = mysql_query("SELECT `id` FROM `stats` WHERE `country`='$country'") or die(mysql_error());
        if (mysql_num_rows($register1) > 0) {
			output("The Country Name is already being used!");
        }else{
            $ins1 = mysql_query("UPDATE `stats` SET `country`='$country' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			output("You have Named Your Country!");
			?>
			<meta http-equiv="refresh" content="2">
            <?php
		};
	 };
};

if(!isset($_SESSION['uid'])){
  echo "You must be logged in to view this page";
}else{
  ?><br />
  <center><h2>Your Profile</h2></center>
  <br /><div id="profile">
  <table cellpadding ="4" cellspacing="4">
    <tr>
     
      <h5><a href="edit_profile.php">Edit Your Profile</a></h5>
     
      <h3>Username:
      <i><?php echo $user['username']; ?></h3></i>
    </tr>
    
    <tr>
      <h3>Points: 
      <i><?php echo number_format($stats['reputation']); ?></h3></i>
    </tr>
    
    <tr>
      <h3><center>Country:
      <i>
	  <?php 
	  if(strlen($stats['country']) < 1){
		  ?> <form action="main.php" method="POST"> <input type="text" name="country"/><br /> <input type="submit" name="changecountry" value="Change"/> </form><?php 
	  }else echo $stats['country']; ?></center></h3></i>
    <tr>

    <tr>
      <h3><center>Attack:
      <i><?php echo number_format($stats['attack']); ?></center></h3></i>
    <tr>
    
    <tr>
      <h3><center>Defence:
      <i><?php echo number_format($stats['defence']); ?></center></h3></i>
    <tr>
    </table></div>
  <?php
}

include("footer.php");
?>
