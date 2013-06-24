<?php
include("buildinginfo.php");

$attack = (1 * $unit['soldier'] + 3 * $unit['ranger'] + 2 * $unit['tank']);

$defence = (1 * $unit['soldier'] + 1 * $unit['ranger'] + 4 * $unit['tank']);

$warehouse = $warehouselvl;

if($shoplvl == 1) {
	$income = 5;
	$nxtlvlincome = 15;
}elseif($shoplvl == 2) {
	$income = 15;
	$nxtlvlincome = 35;
}elseif($shoplvl == 3) {
	$income = 35;
	$nxtlvlincome = 100;
}elseif($shoplvl == 4) {
	$income = 100;
	$nxtlvlincome = 300;
}elseif($shoplvl == 5) {
	$income = 300;
	$nxtlvlincome = 500;
}elseif($shoplvl == 6) {
	$income = 500;
	$nxtlvlincome = 1500;
}elseif($shoplvl == 7) {
	$income = 1500;
	$nxtlvlincome = 3000;
}elseif($shoplvl == 8) {
	$income = 3000;
	$nxtlvlincome = 10000;
}elseif($shoplvl == 9) {
	$income = 10000;
	$nxtlvlincome = 50000;
}elseif($shoplvl == 10) {
	$income = 50000;
	$nxtlvlincome = 0;
}else{
	$income = 5;	
}

if($farmlvl == 1) {
	$farming = 5;
	$nxtlvlfarming = 15;
}elseif($farmlvl == 2) {
	$farming = 15;	
	$nxtlvlfarming = 35;
}elseif($farmlvl == 3) {
	$farming = 35;
	$nxtlvlfarming = 100;
}elseif($farmlvl == 4) {
	$farming = 100;
	$nxtlvlfarming = 300;
}elseif($farmlvl == 5) {
	$farming = 300;
	$nxtlvlfarming = 500;
}elseif($farmlvl == 6) {
	$farming = 500;
	$nxtlvlfarming = 1500;
}elseif($farmlvl == 7) {
	$farming = 1500;
	$nxtlvlfarming = 3000;
}elseif($farmlvl == 8) {
	$farming = 3000;
	$nxtlvlfarming = 10000;
}elseif($farmlvl == 9) {
	$farming = 10000;
	$nxtlvlfarming = 50000;
}elseif($farmlvl == 10) {
	$farming = 50000;
	$nxtlvlfarming = 0;
}else{
	$farming = 5;	
}

if($warehouse == 1) {
	$capacity = 500;
	$nxtlvlcapacity = 1500;
}elseif($warehouse == 2){
	$capacity = 1500;
	$nxtlvlcapacity = 4000;
}elseif($warehouse == 3){
	$capacity = 4000;
	$nxtlvlcapacity = 13000;
}elseif($warehouse == 4){
	$capacity = 13000;
	$nxtlvlcapacity = 40000;
}elseif($warehouse == 5){
	$capacity = 40000;
	$nxtlvlcapacity = 120000;
}elseif($warehouse == 6){
	$capacity = 120000;
	$nxtlvlcapacity = 350000;
}elseif($warehouse == 7){
	$capacity = 350000;
	$nxtlvlcapacity = 1000000;
}elseif($warehouse == 8){
	$capacity = 1000000;
	$nxtlvlcapacity = 3000000;
}elseif($warehouse == 9){
	$capacity = 3000000;
	$nxtlvlcapacity = 9000000;
}elseif($warehouse == 10){
	$capacity = 9000000;
	$nxtlvlcapacity = 0;
}else{
	$capacity = 500;
}

$update_stats = mysql_query("UPDATE `stats` SET 
                            `income`='".$income."',`farming`='".$farming."',
                            `attack`='".$attack."',`defence`='".$defence."',
							`capacity`='".$capacity."'
                            WHERE `id`='".$_SESSION['uid']."'") or die(mysql_error());
?>
