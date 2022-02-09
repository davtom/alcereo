<?php
$link = new mysqli("localhost","playground","KF1HdsgnnQCbQYh9N0Bw","playground");
if ($link -> connect_errno) {
  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
  exit();
}
?> 