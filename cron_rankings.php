<?php
include("functions.php");
connect();

// Rankings Every 15 minutes

$get_reputation = mysql_query("SELECT `id`,`reputation` FROM `stats` ORDER BY `reputation` DESC") or die(mysql_error());
$i = 1;
$rank = array();
while($reputation = mysql_fetch_assoc($get_reputation)){
    $rank[$reputation['id']] = $reputation['reputation'];
    mysql_query("UPDATE `ranking` SET `reputation`='".$i."' WHERE `id`='".$reputation['id']."'") or die(mysql_error());
    $i++;
}

asort($rank);
$rank2 = array_reverse($rank,true);
$i = 1;
foreach($rank2 as $key => $val){
    mysql_query("UPDATE `ranking` SET `overall`='".$i."' WHERE `id`='".$key."'") or die(mysql_error());
    $i++;
}
?>