<?php

function connect() {
  mysql_connect("localhost", "arm103_1", "T1ckT0ck");
  mysql_select_db("arm103_game");
}

function protect($string) {
  return mysql_real_escape_string(strip_tags(addslashes($string)));
}

function output($string) {
  echo "<div id=\"output\">" . $string . "</div>";
}

?>