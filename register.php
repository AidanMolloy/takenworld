<?php
session_start();
include("header.php");
?>
<h2>Register</h2>
<br />
<?php
if(isset($_POST['register'])){
    $username = protect($_POST['username']);
    $password = protect($_POST['password']);
	$confirmpassword = protect($_POST['confirmpassword']);
    $email = protect($_POST['email']);
	$country = protect($_POST['country']);
    
    if($username == "" || $password == "" || $country == "" || $confirmpassword == "" || $email == ""){
        echo "Please supply all fields!";
    }elseif(strlen($username) > 20){
        echo "Username must be less than 20 characters!";
    }elseif(strlen($email) > 90){
        echo "E-mail must be less than 90 characters!";
    }elseif(strlen($username) < 4){
        echo "Username must have at least 4 letters";
	}elseif($password !== $confirmpassword) {
	    echo "Your passwords do not match";
	}elseif(strlen($country) > 20) {
		echo "Country Name must be less then 20 characters";
	}elseif(strlen($country) < 4) {
		echo "Country Name must have at least 4 characters";
    }else{
        $register1 = mysql_query("SELECT `id` FROM `user` WHERE `username`='$username'") or die(mysql_error());
        $register2 = mysql_query("SELECT `id` FROM `user` WHERE `email`='$email'") or die(mysql_error());
		$register3 = mysql_query("SELECT `id` FROM `stats` WHERE `country`='$country'") or die(mysql_error());
        if(mysql_num_rows($register1) > 0){
            echo "That username is already in use!";
        }elseif(mysql_num_rows($register2) > 0){
            echo "That e-mail address is already in use!";
		}elseif(mysql_num_rows($register3) > 0) {
			echo "That Country Name is already used!";
        }else{
            $ins1 = mysql_query("INSERT INTO `stats` (`gold`,`attack`,`defence`,`food`,`income`,`farming`,`energy`,`reputation`,`country`) VALUES (100,5,10,100,5,5,100,1,'$country')") or die(mysql_error());
            $ins2 = mysql_query("INSERT INTO `unit` (`soldier`,`ranger`,`tank`) VALUES (5,0,0)") or die(mysql_error());
            $ins3 = mysql_query("INSERT INTO `user` (`username`,`password`,`email`) VALUES ('$username','".md5($password)."','$email')") or die(mysql_error());
            $ins5 = mysql_query("INSERT INTO `ranking` (`reputation`,`overall`) VALUES(0,0)") or die(mysql_error());	
			$ins6 = mysql_query("INSERT INTO `buildings` (`shoplvl`,`farmlvl`,`warehouselvl`) VALUES (1,1,1)") or die(mysql_error());
			echo "You have registered!";
        }
    }
}
?>
<br /><br />
<form action="register.php" method="POST">
Username: <input type="text" name="username"/><br />
Country Name: <input type="text" name="country"/><br />
Password: <input type="password" name="password"/><br />
Confirm Password: <input type="password" name="confirmpassword"/><br />
E-mail: <input type="text" name="email"/><br />
<input type="submit" name="register" value="Register"/>
</form>
<?php
include("footer.php");
?>
