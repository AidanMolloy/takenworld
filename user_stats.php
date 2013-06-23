<?php

if(isset($_SESSION['uid'])){
  include("safe.php");
  
  if($stats['reputation'] == 1 || $stats['reputation'] == 0) {
  $rrank = "Level 1";
  $userlevel = 1;
  }elseif($stats['reputation'] == 2) {
  $rrank = "Level 2";
  $userlevel = 2;
  }elseif($stats['reputation'] > 2 && $stats['reputation'] < 6) {
  $rrank = "Level 3";
  $userlevel = 3;
  }elseif($stats['reputation'] > 6 && $stats['reputation'] < 15) {
  $rrank = "Level 4";
  $userlevel = 4;
  }elseif($stats['reputation'] > 15 && $stats['reputation'] < 25) {
  $rrank = "Level 5";
  $userlevel = 5;
  }elseif($stats['reputation'] > 25 && $stats['reputation'] < 50) {
  $rrank = "Level 6";
  $userlevel = 6;
  }elseif($stats['reputation'] > 50 && $stats['reputation'] < 100) {
  $rrank = "Level 7";
  $userlevel = 7;
  }elseif($stats['reputation'] > 100 && $stats['reputation'] < 170) {
  $rrank = "Level 8";
  $userlevel = 8;
  }elseif($stats['reputation'] > 170 && $stats['reputation'] < 350) {
  $rrank = "Level 9";
  $userlevel = 9;
  }elseif($stats['reputation'] > 350 && $stats['reputation'] < 700) {
  $rrank = "Level 10";
  $userlevel = 10;
  }elseif($stats['reputation'] > 700 && $stats['reputation'] < 1500) {
  $rrank = "Level 11";
  $userlevel = 11;
  }elseif($stats['reputation'] > 1500 && $stats['reputation'] < 3000) {
  $rrank = "Level 12";
  $userlevel = 12;
  }elseif($stats['reputation'] > 3000 && $stats['reputation'] < 6500) {
  $rrank = "Level 13";
  $userlevel = 13;
  }elseif($stats['reputation'] > 6500 && $stats['reputation'] < 15000) {
  $rrank = "Level 14";
  $userlevel = 14;
  }elseif($stats['reputation'] > 15000 && $stats['reputation'] < 30000) {
  $rrank = "Level 15";
  $userlevel = 15;
  }elseif($stats['reputation'] > 30000 && $stats['reputation'] < 50000){
  $rrank = "Level 16";
  $userlevel = 16;
  }elseif($stats['reputation'] > 50000 && $stats['reputation'] < 100000){
  $rrank = "Level 17";
  $userlevel = 17;
  }elseif($stats['reputation'] > 100000 && $stats['reputation'] < 200000){
  $rrank = "Level 18";
  $userlevel = 18;
  }elseif($stats['reputation'] > 200000 && $stats['reputation'] < 350000){
  $rrank = "Level 19";
  $userlevel = 19;
  }else{ 
  $rrank = "Level 20";
  $userlevel = 20;
  };
  
  $update_rank = mysql_query("UPDATE `ranking` SET 
                            `rank`='".$rrank."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
  
}else{
 
};

?>
