<?php

if(isset($_SESSION['uid'])){
  include("safe.php");
  
  if($stats['reputation'] == 1 || $stats['reputation'] == 0) {
  $rrank = "Level 1";
  $userlevel = 1;
  $nextlevelreq = 1;
  }elseif($stats['reputation'] == 2) {
  $rrank = "Level 2";
  $userlevel = 2;
  $nextlevelreq = 2;
  }elseif($stats['reputation'] > 2 && $stats['reputation'] < 6) {
  $pointsUsed = 2;
  $rrank = "Level 3";
  $userlevel = 3;
  $nextlevelreq = 4;
  }elseif($stats['reputation'] > 6 && $stats['reputation'] < 15) {
  $pointsUsed = 6;
  $rrank = "Level 4";
  $userlevel = 4;
  $nextlevelreq = 9;
  }elseif($stats['reputation'] > 15 && $stats['reputation'] < 25) {
  $pointsUsed = 15;
  $rrank = "Level 5";
  $userlevel = 5;
  $nextlevelreq = 11;
  }elseif($stats['reputation'] > 25 && $stats['reputation'] < 50) {
  $pointsUsed = 25;
  $rrank = "Level 6";
  $userlevel = 6;
  $nextlevelreq = 25;
  }elseif($stats['reputation'] > 50 && $stats['reputation'] < 100) {
  $pointsUsed = 50;
  $rrank = "Level 7";
  $userlevel = 7;
  $nextlevelreq = 50;
  }elseif($stats['reputation'] > 100 && $stats['reputation'] < 170) {
  $pointsUsed = 100;
  $rrank = "Level 8";
  $userlevel = 8;
  $nextlevelreq = 70;
  }elseif($stats['reputation'] > 170 && $stats['reputation'] < 350) {
  $pointsUsed = 170;
  $rrank = "Level 9";
  $userlevel = 9;
  $nextlevelreq = 180;
  }elseif($stats['reputation'] > 350 && $stats['reputation'] < 700) {
  $pointsUsed = 350;
  $rrank = "Level 10";
  $userlevel = 10;
  $nextlevelreq = 350;
  }elseif($stats['reputation'] > 700 && $stats['reputation'] < 1500) {
  $pointsUsed = 700;
  $rrank = "Level 11";
  $userlevel = 11;
  $nextlevelreq = 800;
  }elseif($stats['reputation'] > 1500 && $stats['reputation'] < 3000) {
  $pointsUsed = 1500;
  $rrank = "Level 12";
  $userlevel = 12;
  $nextlevelreq = 1500;
  }elseif($stats['reputation'] > 3000 && $stats['reputation'] < 6500) {
  $pointsUsed = 3000;
  $rrank = "Level 13";
  $userlevel = 13;
  $nextlevelreq = 3500;
  }elseif($stats['reputation'] > 6500 && $stats['reputation'] < 15000) {
  $pointsUsed = 6500;
  $rrank = "Level 14";
  $userlevel = 14;
  $nextlevelreq = 8500;
  }elseif($stats['reputation'] > 15000 && $stats['reputation'] < 30000) {
  $pointsUsed = 15000;
  $rrank = "Level 15";
  $userlevel = 15;
  $nextlevelreq = 15000;
  }elseif($stats['reputation'] > 30000 && $stats['reputation'] < 50000){
  $pointsUsed = 30000;
  $rrank = "Level 16";
  $userlevel = 16;
  $nextlevelreq = 20000;
  }elseif($stats['reputation'] > 50000 && $stats['reputation'] < 100000){
  $pointsUsed = 50000;
  $rrank = "Level 17";
  $userlevel = 17;
  $nextlevelreq = 50000;
  }elseif($stats['reputation'] > 100000 && $stats['reputation'] < 200000){
  $pointsUsed = 10000;
  $rrank = "Level 18";
  $userlevel = 18;
  $nextlevelreq = 100000;
  }elseif($stats['reputation'] > 200000 && $stats['reputation'] < 350000){
  $pointsUsed = 200000;
  $rrank = "Level 19";
  $userlevel = 19;
  $nextlevelreq = 150000;
  }elseif($stats['reputation'] > 350000 && $stats['reputation'] < 700000) {
  $pointsUsed = 350000;
  $rrank = "Level 20";
  $userlevel = 20;
  $nextlevelreq = 350000;
  }elseif($stats['reputation'] > 700000 && $stats['reputation'] < 1500000) {
  $pointsUsed = 700000;
  $rrank = "Level 21";
  $userlevel = 21;
  $nextlevelreq = 7000000;
  }elseif($stats['reputation'] > 1500000 && $stats['reputation'] < 4000000) {
  $pointsUsed = 1500000;
  $rrank = "Level 22";
  $userlevel = 22;
  $nextlevelreq = 2500000;
  }elseif($stats['reputation'] > 4000000 && $stats['reputation'] < 10000000) {
  $pointsUsed = 4000000;
  $rrank = "Level 23";
  $userlevel = 23;
  $nextlevelreq = 6000000;
  }elseif($stats['reputation'] > 10000000 && $stats['reputation'] < 20000000) {
  $pointsUsed = 10000000;
  $rrank = "Level 24";
  $userlevel = 24;
  $nextlevelreq = 10000000;
  }elseif($stats['reputation'] > 20000000 && $stats['reputation'] < 40000000) {
  $pointsUsed = 20000000;
  $rrank = "Level 25";
  $userlevel = 25;
  $nextlevelreq = 20000000;
  }elseif($stats['reputation'] > 40000000 && $stats['reputation'] < 80000000) {
  $pointsUsed = 40000000;
  $rrank = "Level 26";
  $userlevel = 26;
  $nextlevelreq = 40000000;
  }else{ 
  $rrank = "Level 27";
  $userlevel = 27;
  $nextlevelreq = 0;
  };
  
  $update_level = mysql_query("UPDATE `stats` SET 
    						`level`='".$userlevel."' 
							WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
  $update_rank = mysql_query("UPDATE `ranking` SET 
                            `rank`='".$rrank."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
  
}else{
 
};

?>
