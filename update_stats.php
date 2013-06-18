<?php
include("buildinginfo.php");

$attack = (1 * $unit['soldier'] + 3 * $unit['ranger']);

$defence = (1 * $unit['soldier'] + 1 * $unit['ranger']);

$warehouse = $warehouselvl;

if($shoplvl == 1) {
	$income = 5;
}elseif($shoplvl == 2) {
	$income = 20;	
}elseif($shoplvl == 3) {
	$income = 80;	
}elseif($shoplvl == 4) {
	$income = 320;	
}elseif($shoplvl == 5) {
	$income = 1280;	
}elseif($shoplvl == 6) {
	$income = 5120;	
}elseif($shoplvl == 7) {
	$income = 20480;	
}elseif($shoplvl == 8) {
	$income = 81920;	
}elseif($shoplvl == 9) {
	$income = 327680;	
}elseif($shoplvl == 10) {
	$income = 1310720;	
}else{
	$income = 5;	
}

if($farmlvl == 1) {
	$farming = 5;
}elseif($farmlvl == 2) {
	$farming = 20;	
}elseif($farmlvl == 3) {
	$farming = 80;	
}elseif($farmlvl == 4) {
	$farming = 320;	
}elseif($farmlvl == 5) {
	$farming = 1280;	
}elseif($farmlvl == 6) {
	$farming = 5120;	
}elseif($farmlvl == 7) {
	$farming = 20480;	
}elseif($farmlvl == 8) {
	$farming = 81920;	
}elseif($farmlvl == 9) {
	$farming = 327680;	
}elseif($farmlvl == 10) {
	$farming = 1310720;	
}else{
	$farming = 5;	
}

if($warehouse == 1) {
	$capacity = 500;
}elseif($warehouse == 2){
	$capacity = 2000;
}elseif($warehouse == 3){
	$capacity = 8000;
}elseif($warehouse == 4){
	$capacity = 32000;
}elseif($warehouse == 5){
	$capacity = 128000;
}elseif($warehouse == 6){
	$capacity = 512000;
}elseif($warehouse == 7){
	$capacity = 2048000;
}elseif($warehouse == 8){
	$capacity = 8192000;
}elseif($warehouse == 9){
	$capacity = 32768000;
}elseif($warehouse == 10){
	$capacity = 131072000;
}else{
	$capacity = 500;
}

$update_stats = mysql_query("UPDATE `stats` SET 
                            `income`='".$income."',`farming`='".$farming."',
                            `attack`='".$attack."',`defence`='".$defence."',
							`capacity`='".$capacity."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
?>