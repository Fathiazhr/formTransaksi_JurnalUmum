<?php
session_start();

$conn = mysqli_connect(
  'localhost',
  'root',
  '',
  'db_jurnalumum'
) or die(mysqli_error($mysqli));

?>
