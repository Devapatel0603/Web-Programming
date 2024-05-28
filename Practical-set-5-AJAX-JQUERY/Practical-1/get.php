<?php
include 'connection.php';
if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['search'])){
  $search = $_REQUEST['search'];
  $query = "SELECT uname, email, phone FROM user WHERE uname LIKE '%$search%' ;";
  $result = mysqli_query($conn, $query);
  $i = 1;
  if($result && mysqli_num_rows($result) > 0){
    while ($row = mysqli_fetch_assoc($result)) {
      echo "<tr>
        <th>$i</th>
        <td>" . $row['uname'] . "</td>
        <td>" . $row['email'] . "</td>
        <td>" . $row['phone'] . "</td>
      </tr>";
      $i += 1;
    }
  }
  else {
    echo "No data found for <b>$search</b>";
  }
}
?>