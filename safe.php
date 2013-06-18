<?php

$stats_get = mysql_query("SELECT * FROM `stats` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$stats = mysql_fetch_assoc($stats_get);

$unit_get = mysql_query("SELECT * FROM `unit` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$unit = mysql_fetch_assoc($unit_get);

$user_get = mysql_query("SELECT * FROM `user` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$user = mysql_fetch_assoc($user_get);

$buildings_get = mysql_query("SELECT * FROM `buildings` WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
$buildings = mysql_fetch_assoc($buildings_get);


?>