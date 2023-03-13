<?php

function insertData($conn, $username, $matchTime, $role, $winLoss){

  $sql = "INSERT INTO over_stat Values('$username', '$matchTime', '$role', '$winLoss');";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

}

function getWinLoss($conn, $username, $role){

  $sql = "Select DATE_FORMAT(match_time,  '%H:00') as Hour, AVG(win_loss = 'W') as Win_Rate from over_stat where username = '$username' and player_role = '$role' group by EXTRACT(HOUR FROM match_time), player_role order by AVG(win_loss = 'W') desc limit 1;";

  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo "Hour: " . $row["Hour"]. "<br>";
    }
  } else {
    echo "No Data found for this User :(";
  }
}

function connectSQL($servername, $username){
  
  $conn = new mysqli($servername, $username);
  
  if (mysqli_connect_error()) {
    die("Database connection failed");
  }
  return $conn;
}

function selectSQLTable($conn, $table){

  $selTable = mysqli_select_db( $conn, $table);

  if(! $selTable ) {
    die('Could not select database');
  };
}

function closeSQLConnection($conn){
  $conn->close();
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Over-Stat</title>
  </head>

  <body>
    <header>
      <nav>
        <a href="home.php"><button>Global</button></a>
        <a href="Enter-Data.php"><button>Enter Data</button></a>
        <a href="Your-Data.php"
          ><button class="nav-active">Your Data</button></a
        >
      </nav>
    </header>

    <?php 
    $conn = connectSQL("localhost", "root"); 
    selectSQLTable($conn, "over-stat");

    ?><

    <div>
      <div>
        <img src="Images/tank.png" alt="Tank Icon" />
      </div>
      &nbsp;
      <span>&nbsp;Global Best Time to Play Tank:
      </span>
      <?php
        getWinLoss($conn, "TEST", "T")
      ?>
      &nbsp;
      

      <div>
        <img src="Images/OffenseIcon.webp" alt="Damage Icon" />
      </div>
      &nbsp;
      <span>Global Best Time to Play Damage: #TBD#</span>

      <div>
        <img src="Images/SupportIcon.webp" alt="Support Icon" />
      </div>
      &nbsp;
      <span>Global Best Time to Play Support: #TBD#</span>
    </div>
  </body>
</html>