<?php
include("safe.php");

// Shop
if($buildings['shoplvl'] == 1) {
	$shoplvl = 1;
	$shopcost = 100;
}elseif($buildings['shoplvl'] == 2) {
	$shoplvl = 2;
	$shopcost = 400;
}elseif($buildings['shoplvl'] == 3) {
	$shoplvl = 3;
	$shopcost = 2000;
}elseif($buildings['shoplvl'] == 4) {
	$shoplvl = 4;
	$shopcost = 8000;
}elseif($buildings['shoplvl'] == 5) {
	$shoplvl = 5;
	$shopcost = 16000;
}elseif($buildings['shoplvl'] == 6) {
	$shoplvl = 6;
	$shopcost = 32000;
}elseif($buildings['shoplvl'] == 7) {
	$shoplvl = 7;
	$shopcost = 64000;
}elseif($buildings['shoplvl'] == 8) {
	$shoplvl = 8;
	$shopcost = 128000;
}elseif($buildings['shoplvl'] == 9) {
	$shoplvl = 9;
	$shopcost = 256000;
}elseif($buildings['shoplvl'] == 10) {
	$shoplvl = 10;
	$shopcost = 0;
}else{ 
$shoplvl = 0;
$shopcost = 0;
};

//Farm
if($buildings['farmlvl'] == 1) {
	$farmlvl = 1;
	$farmcost = 100;
}elseif($buildings['farmlvl'] == 2) {
	$farmlvl = 2;
	$farmcost = 400;
}elseif($buildings['farmlvl'] == 3) {
	$farmlvl = 3;
	$farmcost = 2000;
}elseif($buildings['farmlvl'] == 4) {
	$farmlvl = 4;
	$farmcost = 8000;
}elseif($buildings['farmlvl'] == 5) {
	$farmlvl = 5;
	$farmcost = 16000;
}elseif($buildings['farmlvl'] == 6) {
	$farmlvl = 6;
	$farmcost = 32000;
}elseif($buildings['farmlvl'] == 7) {
	$farmlvl = 7;
	$farmcost = 64000;
}elseif($buildings['farmlvl'] == 8) {
	$farmlvl = 8;
	$farmcost = 128000;
}elseif($buildings['farmlvl'] == 9) {
	$farmlvl = 9;
	$farmcost = 256000;
}elseif($buildings['farmlvl'] == 10) {
	$farmlvl = 10;
	$farmcost = 0;
}else{ 
$farmlvl = 0; 
$farmcost = 0;
};

//Warehouse
if($buildings['warehouselvl'] == 1) {
	$warehouselvl = 1;
	$warehousecost = 400;
}elseif($buildings['warehouselvl'] == 2) {
	$warehouselvl = 2;
	$warehousecost = 500;
}elseif($buildings['warehouselvl'] == 3) {
	$warehouselvl = 3;
	$warehousecost = 2000;
}elseif($buildings['warehouselvl'] == 4) {
	$warehouselvl = 4;
	$warehousecost = 8000;
}elseif($buildings['warehouselvl'] == 5) {
	$warehouselvl = 5;
	$warehousecost = 30000;
}elseif($buildings['warehouselvl'] == 6) {
	$warehouselvl = 6;
	$warehousecost = 80000;
}elseif($buildings['warehouselvl'] == 7) {
	$warehouselvl = 7;
	$warehousecost = 200000;
}elseif($buildings['warehouselvl'] == 8) {
	$warehouselvl = 8;
	$warehousecost = 800000;
}elseif($buildings['warehouselvl'] == 9) {
	$warehouselvl = 9;
	$warehousecost = 1000000;
}elseif($buildings['warehouselvl'] == 10) {
	$warehouselvl = 10;
}else{ $warehouselvl = 0; };


?>
