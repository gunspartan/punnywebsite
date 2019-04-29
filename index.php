<?php
  include_once 'api/dbh.php';
?>

<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Pun Generator</title>
    <link rel="stylesheet" href="style.css" type="text/css">
  </head>

  <body>
    <div class="pun">
      <?php
        $sql = "SELECT * FROM pun;";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck > 0) {
          $randNum = mt_rand(1, $resultCheck);
          $randPun = "SELECT * FROM pun WHERE id=$randNum;";
          $newResult = mysqli_query($conn, $randPun);
          $row = mysqli_fetch_assoc($newResult);
          echo '<h1>' . $row['title'] . '<br>' . '<br>' . '</h1>';
          echo '<h1>' . $row['content'] . '</h1>';
        }
      ?>

      <h2 id = pun></h2>
      <form action="index.php" method='GET'>
        <button type="submit" name="newpun">New Pun</button>
      </form>
    </div>

    <div class= "submit">
      <h2>Submit a pun!</h2>
      <form action="api/submitpun.php" method="POST">
        <input type="text" name="title" placeholder="Title">
        <br>
        <input type="text" name="content" placeholder="Content">
        <br>
        <button type="submit" name="submit">Submit</button>
      </form>
    </div>
  </body>

</html>
