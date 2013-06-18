<?php

if(isset($_SESSION['uid'])){
  include("safe.php");
  
  if($stats['reputation'] == 1 || $stats['reputation'] == 0) {
  $rrank = "1 [Private]";
  }elseif($stats['reputation'] == 2) {
  $rrank = "2 [Private First Class]";
  }elseif($stats['reputation'] > 2 && $stats['reputation'] < 5) {
  $rrank = "3 [Corporal]";
  }elseif($stats['reputation'] > 3 && $stats['reputation'] < 10) {
  $rrank = "4 [Sergeant]";
  }elseif($stats['reputation'] > 7 && $stats['reputation'] < 20) {
  $rrank = "5 [Sergeant First Class]";
  }elseif($stats['reputation'] > 15 && $stats['reputation'] < 40) {
  $rrank = "6 [Sergeant Major]";
  }elseif($stats['reputation'] > 31 && $stats['reputation'] < 80) {
  $rrank = "7 [Second Lieutenant]";
  }elseif($stats['reputation'] > 63 && $stats['reputation'] < 160) {
  $rrank = "8 [First Lieutenant]";
  }elseif($stats['reputation'] > 127 && $stats['reputation'] < 320) {
  $rrank = "9 [Captain]";
  }elseif($stats['reputation'] > 255 && $stats['reputation'] < 640) {
  $rrank = "10 [Major]";
  }elseif($stats['reputation'] > 511 && $stats['reputation'] < 1280) {
  $rrank = "11 [Lieutenant Colonel]";
  }elseif($stats['reputation'] > 1023 && $stats['reputation'] < 2560) {
  $rrank = "12 [Colonel]";
  }elseif($stats['reputation'] > 2047 && $stats['reputation'] < 5120) {
  $rrank = "13 [Brigadier General]";
  }elseif($stats['reputation'] > 4095 && $stats['reputation'] < 10240) {
  $rrank = "14 [Major General]";
  }elseif($stats['reputation'] > 8191 && $stats['reputation'] < 20480) {
  $rrank = "15 [Lieutenant General]";
  }else{ 
  $rrank = "16 [General]";
  };
  
  $update_rank = mysql_query("UPDATE `ranking` SET 
                            `rank`='".$rrank."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
  
}else{
 
};

?>