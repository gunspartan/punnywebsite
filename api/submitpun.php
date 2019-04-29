<?php
  include_once 'dbh.php';

  $title = $_POST['title'];
  $content = $_POST['content'];

  $sql = "INSERT INTO pun (title, content) VALUES ('$title', '$content');";

  mysqli_query($conn, $sql);

  header("Location: ../index.php?submitpun=success");