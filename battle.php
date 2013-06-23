<?php
session_start();
include("header.php");
include("user_stats.php");
if(!isset($_SESSION['uid'])){
    echo "You must be logged in to view this page!";
}else{
	$id = protect($_POST['id']);
	$attacks_check = mysql_query("SELECT `id` FROM `logs` WHERE `attacker`='".$_SESSION['uid']."' AND `defender`='".$id."' AND `time`>'".(time() - 86400)."'") or die(mysql_error());
  if(isset($_POST['gold'])) {
    $energy = protect($_POST['energy']);
    $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
    if(mysql_num_rows($user_check) ==0) {
      output("There is no user with that ID!");
    }elseif($energy < 1 || $energy > 10) {
      output("You must attack with 1 - 10 energy!");
    }elseif($energy > $stats['energy']){
      output("You do not have enough energy!");
    }elseif($id == $_SESSION['uid']) {
      output("You can not attack yourself!");
    }elseif(mysql_num_rows($attacks_check) > 9) {
      output("This person has been already attacked the maximum of 10 times in the last 24 hours!");
    }else{
        $enemy_stats = mysql_fetch_assoc($user_check);
        $attack_effect = $energy * 0.1 * $stats['attack'];
        $defence_effect = $enemy_stats['defence'];
        
        echo "You send your units into battle!<br><br>";
        echo "Your units dealt " . number_format($attack_effect) . " damage!<br>";
        echo "The enemy's units dealt " . number_format($defence_effect) . " damage!<br><br>";
        if($attack_effect > $defence_effect){
		$reputationGain = $attack_effect -= $defence_effect;
        $gold_stolen = $enemy_stats['gold'];
        
        if($gold_stolen < 0) {
        	$gold_stolen = 0;
        }
		$reputationGained = ($reputationGain / 10);
		
		$goldcapacityleft = $stats['capacity'];
		$goldcapacityleft -= $stats['gold'];
		$gold = $stats['gold'];
		$gold += $gold_stolen;
		
		if($goldcapacityleft == 0) {
			echo "You do not have any storage space left for gold!";
		}elseif($gold > $stats['capacity']) {
			$goldovercap = $gold;
			$goldovercap -= $stats['capacity'];
			$gold = $stats['capacity'];
			
			echo "You won the battle! You stole " . $gold_stolen . " gold but you don't have enough room. " . $goldovercap . " gold has been returned to the Defender.<br>";
			
			$battle9 = mysql_query("UPDATE `stats` SET `gold`=`gold`-'".$gold_stolen."'+'".$goldovercap."' WHERE `id`='".$id."'") or die(mysql_error());
			$battle10 = mysql_query("UPDATE `stats` SET `gold`='".$gold."', `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			$battle11 = mysql_query("UPDATE `stats` SET `reputation`=`reputation`+'".$reputationGained."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			$battle12 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`)
                                VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defence_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());
		}else{
			
        echo "You won the battle!<br>";
		echo "You stole " . $gold_stolen . " gold!<br>";
		echo "You beat your opponent by " .  number_format($reputationGain) . "<br>";
        echo "You got " . number_format($reputationGained) . " points!";
        $battle1 = mysql_query("UPDATE `stats` SET `gold`=`gold`-'".$gold_stolen."' WHERE `id`='".$id."'") or die(mysql_error());
        $battle2 = mysql_query("UPDATE `stats` SET `gold`='".$gold."', `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
        $battle3 = mysql_query("UPDATE `stats` SET `reputation`=`reputation`+'".$reputationGained."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
        $battle4 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`)
                                VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defence_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());
        $stats['gold'] = $gold;
        $stats['energy'] -= $energy;
        $stats['reputation'] += 2;
        };
      }else{
        echo "You lost the battle!";
		$energy = ($energy / 2);
        $stats['energy'] -= $energy;
		$battle17 = mysql_query("UPDATE `stats` SET `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      }
    }
  }elseif(isset($_POST['food'])) {
    $energy = protect($_POST['energy']);
    $id = protect($_POST['id']);
    $user_check = mysql_query("SELECT * FROM `stats` WHERE `id`='".$id."'") or die(mysql_error());
    if(mysql_num_rows($user_check) ==0) {
      output("There is no user with that ID!");
    }elseif($energy < 1 || $energy > 10) {
      output("You must attack with 1 - 10 energy!");
    }elseif($energy > $stats['energy']){
      output("You do not have enough energy!");
    }elseif($id == $_SESSION['uid']) {
      output("You can not attack yourself!");
    }else{
        $enemy_stats = mysql_fetch_assoc($user_check);
        $attack_effect = $energy * 0.1 * $stats['attack'];
        $defence_effect = $enemy_stats['defence'];
        
        echo "You send your units into battle!<br><br>";
        echo "Your units dealt " . number_format($attack_effect) . " damage!<br>";
        echo "The enemy's defenders dealt " . number_format($defence_effect) . " damage!<br><br>";
        if($attack_effect > $defence_effect){
		$reputationGain = $attack_effect -= $defence_effect;
        $food_stolen = $enemy_stats['food'];
        
        if($food_stolen < 0) {
        	$food_stolen = 0;
        }
		$reputationGained = ($reputationGain / 100);
		$reputationGained*$userlevel; 
		
		$foodcapacityleft = $stats['capacity'];
		$foodcapacityleft -= $stats['food'];
		$food = $stats['food'];
		$food += $food_stolen;
		
		if($foodcapacityleft == 0) {
			echo "You do not have any storage space left for food!";
		}elseif($food > $stats['capacity']) {
			$foodovercap = $food;
			$foodovercap -= $stats['capacity'];
			$food = $stats['capacity'];
			
			echo "You won the battle! You stole " . $food_stolen . " food but you don't have enough room. " . $foodovercap . " food has been returned to the Defender.<br>";
			
			$battle13 = mysql_query("UPDATE `stats` SET `food`=`food`-'".$food_stolen."'+'".$foodovercap."' WHERE `id`='".$id."'") or die(mysql_error());
			$battle14 = mysql_query("UPDATE `stats` SET `food`='".$food."', `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			$battle15 = mysql_query("UPDATE `stats` SET `reputation`=`reputation`+'".$reputationGained."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
			$battle16 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`)
                                VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defence_effect."','".$gold_stolen."','0','".time()."')") or die(mysql_error());
		}else{
		
		
        echo "You won the battle! You stole " . $food_stolen . " food!<br>"; 
		echo "You beat your opponent by " .  number_format($reputationGain) . "<br>";
        echo "You got " . number_format($reputationGained) . " points!";
        $battle5 = mysql_query("UPDATE `stats` SET `food`=`food`-'".$food_stolen."' WHERE `id`='".$id."'") or die(mysql_error());
        $battle6 = mysql_query("UPDATE `stats` SET `food`='".$food."', `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
        $battle7 = mysql_query("UPDATE `stats` SET `reputation`=`reputation`+'".$reputationGained."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
        $battle8 = mysql_query("INSERT INTO `logs` (`attacker`,`defender`,`attacker_damage`,`defender_damage`,`gold`,`food`,`time`)
                                VALUES ('".$_SESSION['uid']."','".$id."','".$attack_effect."','".$defence_effect."','0','".$food_stolen."','".time()."')") or die(mysql_error());
        $stats['food'] = $food;
        $stats['energy'] -= $energy;
        $stats['reputation'] += 2;
        };
      }else{
        echo "You lost the battle!";
		$energy = ($energy / 2);
        $stats['energy'] -= $energy;
        $battle18 = mysql_query("UPDATE `stats` SET `energy`=`energy`-'".$energy."' WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
      }
    }
  }else{
    output("You have visited this page incorrectly!");
  }
}

include("footer.php");
?>
