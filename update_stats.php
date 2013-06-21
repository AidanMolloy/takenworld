<?php
include("buildinginfo.php");

$attack = (1 * $unit['soldier'] + 3 * $unit['ranger'] + 2 * $unit['tank']);

$defence = (1 * $unit['soldier'] + 1 * $unit['ranger'] + 4 * $unit['tank']);

$warehouse = $warehouselvl;

if($shoplvl == 1) {
	$income = 4;
}elseif($shoplvl == 2) {
	$income = 12;	
}elseif($shoplvl == 3) {
	$income = 36;	
}elseif($shoplvl == 4) {
	$income = 108;	
}elseif($shoplvl == 5) {
	$income = 324;	
}elseif($shoplvl == 6) {
	$income = 972;	
}elseif($shoplvl == 7) {
	$income = 2916;	
}elseif($shoplvl == 8) {
	$income = 8748;	
}elseif($shoplvl == 9) {
	$income = 26244;	
}elseif($shoplvl == 10) {
	$income = 78732;	
}else{
	$income = 5;	
}

if($farmlvl == 1) {
	$farming = 4;
}elseif($farmlvl == 2) {
	$farming = 12;	
}elseif($farmlvl == 3) {
	$farming = 36;	
}elseif($farmlvl == 4) {
	$farming = 108;	
}elseif($farmlvl == 5) {
	$farming = 324;	
}elseif($farmlvl == 6) {
	$farming = 972;	
}elseif($farmlvl == 7) {
	$farming = 2916;	
}elseif($farmlvl == 8) {
	$farming = 8748;	
}elseif($farmlvl == 9) {
	$farming = 26244;	
}elseif($farmlvl == 10) {
	$farming = 78732;	
}else{
	$farming = 5;	
}

if($warehouse == 1) {
	$capacity = 500;
}elseif($warehouse == 2){
	$capacity = 1500;
}elseif($warehouse == 3){
	$capacity = 4500;
}elseif($warehouse == 4){
	$capacity = 13500;
}elseif($warehouse == 5){
	$capacity = 40500;
}elseif($warehouse == 6){
	$capacity = 121500;
}elseif($warehouse == 7){
	$capacity = 364500;
}elseif($warehouse == 8){
	$capacity = 1093500;
}elseif($warehouse == 9){
	$capacity = 3280500;
}elseif($warehouse == 10){
	$capacity = 9841500;
}else{
	$capacity = 500;
}

$update_stats = mysql_query("UPDATE `stats` SET 
                            `income`='".$income."',`farming`='".$farming."',
                            `attack`='".$attack."',`defence`='".$defence."',
							`capacity`='".$capacity."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
?>
