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
			output("You have changed Your Country Name!");
			?>
			<meta http-equiv="refresh" content="2">
            <?php
		};
	 };
};

if(isset($_POST['changepassword'])){
	$oldpassword = protect($_POST['oldpassword']);
	$newpassword = protect($_POST['newpassword']);
	$confirmpassword = protect($_POST['confirmpassword']);
	
	$password_check = mysql_query("SELECT `password`='".md5($password)."' FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
	
	 if($oldpassword == "" || $newpassword == "" || $confirmpassword == "") {
		 output("Please fill all the text field with a word");
	 }elseif(strlen($newpassword) > 20 ||strlen($confirmpassword) > 20 ) {
		output("Password must be less then 20 characters");
	}elseif(strlen($newpassword) < 4 ||strlen($confirmpassword) < 4 ) {
		output("Password must have at least 4 characters");
	}elseif($newpassword !== $confirmpassword) {
		output("New Password doesnt match with confirm password");
	}elseif($oldpassword !== $password_check ) {
		output("Old password does not match with your real old password");
	 }else{
            $ins2 = mysql_query("UPDATE `user` SET `password`='".md5($password)."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			output("You have changed your password");
			?>
			<meta http-equiv="refresh" content="2">
            <?php
	 };
};

if(isset($_POST['changeemail'])){
	$email = protect($_POST['email']);

	 if($email == "") {
		 output("Please enter a email");
	 }elseif(strlen($email) > 90 ) {
		output("Email must be less then 90 characters!");
	}elseif(strlen($email) < 4 ) {
		output("email must have at least 4 characters");
	 }else{
        $register2 = mysql_query("SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
        if (mysql_num_rows($register2) > 0) {
			output("The Country Name is already being used!");
        }else{
            $ins3 = mysql_query("UPDATE `user` SET `email`='$email' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			output("You have changed Your Email!");
			?>
			<meta http-equiv="refresh" content="2">
            <?php
		};
	 };
};

?>
<br />
<h2 align="center">Edit Your Profile</h2>
<br />
<table cellpadding ="4" cellspacing="4">
    
    <tr>
      <h3><center>Country:
      <i>
	  <?php echo $stats['country']; ?> &nbsp; &nbsp; 
      <form action="edit_profile.php" method="post">
      <input type="text" name="country"/><br /> <input type="submit" name="changecountry" value="Change"/> 
      </form>
      </center></h3></i>
  <tr>

  <tr>
      <h3><center>Password:
      <i>
      <form action="edit_profile.php" method="post">
	  <h4>Old Password:<input type="password" name="oldpassword"/></h4>
      <h4>New Password:<input type="password" name="newpassword"/></h4>
      <h4>Confirm Password:<input type="password" name="confirmpassword"/></h4>
      <input type="submit" name="changepassword" value="Change"/> 
      </form>
      </center></h3></i>
  <tr>
    
  <tr>
      <h3><center>Email:
      <i><?php echo $user['email']; ?> &nbsp; &nbsp; 
      <form action="edit_profile.php" method="post">
      <input type="text" name="email"/><br /> <input type="submit" name="changeemail" value="Change"/> 
      </form>
      </center></h3></i>
  <tr>
</table></div>

<?php
include("footer.php");
?>
