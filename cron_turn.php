<?php
include("functions.php");
connect();
include("update_stats.php");

// Turns every 15 minutes

$get_users = mysql_query("SELECT * FROM `stats`") or die(mysql_error());
while($user = mysql_fetch_assoc($get_users)){
	
	//get
	$gold = $user['gold'];
	$food = $user['food'];
	$energy = $user['energy'];
	
	//add
	$gold += $user['income'];
	$food += $user['farming'];
	$energy += 5;
	
	//check
	if($gold > $user['capacity']) {
		$gold = $user['capacity'];
	};
	if($food > $user['capacity']) {
		$food = $user['capacity'];	
	};
	if($energy > 100) {
		$energy = 100;		
	};
	
	//submit
    $update = mysql_query("UPDATE `stats` SET
                        `gold`= '".$gold."',
                        `food`= '".$food."',
                        `energy`= '".$energy."' WHERE `id`='".$user['id']."'") or die(mysql_error());
							
}

?>