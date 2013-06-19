<?php
include("buildinginfo.php");

$attack = (1 * $unit['soldier'] + 3 * $unit['ranger']);

$defence = (1 * $unit['soldier'] + 1 * $unit['ranger']);

$warehouse = $warehouselvl;

if($shoplvl == 1) {
	$income = 4;
}elseif($shoplvl == 2) {
	$income = 16;	
}elseif($shoplvl == 3) {
	$income = 64;	
}elseif($shoplvl == 4) {
	$income = 256;	
}elseif($shoplvl == 5) {
	$income = 1024;	
}elseif($shoplvl == 6) {
	$income = 4096;	
}elseif($shoplvl == 7) {
	$income = 16384;	
}elseif($shoplvl == 8) {
	$income = 65536;	
}elseif($shoplvl == 9) {
	$income = 262144;	
}elseif($shoplvl == 10) {
	$income = 1048576;	
}else{
	$income = 5;	
}

if($farmlvl == 1) {
	$farming = 4;
}elseif($farmlvl == 2) {
	$farming = 16;	
}elseif($farmlvl == 3) {
	$farming = 64;	
}elseif($farmlvl == 4) {
	$farming = 256;	
}elseif($farmlvl == 5) {
	$farming = 1024;	
}elseif($farmlvl == 6) {
	$farming = 4096;	
}elseif($farmlvl == 7) {
	$farming = 16384;	
}elseif($farmlvl == 8) {
	$farming = 65536;	
}elseif($farmlvl == 9) {
	$farming = 262144;	
}elseif($farmlvl == 10) {
	$farming = 1048576;	
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