<?php
$conn = mysqli_connect("localhost", "root", "", "wp");
if (!$conn) {
  die("Sorry, We failed to connect: " . mysqli_connect_error());
}
?>