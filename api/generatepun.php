<?php
  include_once 'dbh.php';

  $sql = "SELECT * FROM pun;";
  $result = mysqli_query($conn, $sql);
  $resultCheck = mysqli_num_rows($result);

  if ($resultCheck > 0) {
    $randNum = mt_rand(1, $resultCheck);
    $randPun = "SELECT * FROM pun WHERE id=$randNum";
    $newResult = mysqli_query($conn, $randPun);
    $row = mysqli_fetch_assoc($newResult);
    echo $row['title'] . '<br>';
    echo $row['content'];
  }

  header("Location ../index.php?newpun=success");