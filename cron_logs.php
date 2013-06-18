<?php
include("functions.php");
connect();

mysql_query("DELETE FROM `logs` WHERE `time`<'".(time()-86400)."'") or die(mysql_error());


?>