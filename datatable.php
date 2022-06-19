<?php
// check login
session_start();

if (isset($_POST["logout"])) {
  unset($_SESSION["user"]);
}

if (!isset($_SESSION["user"])) {
  header("Location: login.php");
  exit();
}
// end - check login
include("dbconnection.php");
$result = mysqli_query($conn, "select * from data");
echo "

<table border='1' class='table table-hove  rtable'>
<thead>
<th>#</th>
<th>Time</th>
<th>Temprature</th>
<th>Humidity</th>
<th>Light</th>
<th>Moisture</th>";
$count = 0;
while ($data = mysqli_fetch_row($result)) {
  $count++;
  echo "<tr>";
  echo "<td align=center>$count</td>";
  echo "<td align=center>$data[1]</td>";
  echo "<td align=center>$data[2]</td>";
  echo "<td align=center>$data[3]</td>";
  echo "<td align=center>$data[4]</td>";
  echo "<td align=center>$data[5]</td>";
  echo "</tr>";
}
echo '</table>';
