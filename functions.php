<?php

function connect() {
  mysql_connect("**********", "**********", "**********");
  mysql_select_db("**********");
}

function protect($string) {
  return mysql_real_escape_string(strip_tags(addslashes($string)));
}

function output($string) {
  echo "<div id=\"output\">" . $string . "</div>";
}

?>
