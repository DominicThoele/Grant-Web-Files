<?php

$GLOBALS['OS_sqlServer'] = "localhost";
$GLOBALS['OS_sqlUsername'] = "root";
$GLOBALS['OS_sqlPassword'] = "";
$GLOBALS['OS_database'] = "over-stat";




function promptBattletag(){
   // TODO
} 

function checkBattleTag($username){

    $conn = connectSQL(($GLOBALS['OS_sqlServer']), ($GLOBALS['OS_sqlUsername']), ($GLOBALS['OS_sqlPassword']), $GLOBALS['OS_database']);
    selectSQLTable($conn, "over_stat");

    $sql = "Select count(*) where Lower(username) = '$username';";

    $result = $conn->query($sql);

    if($result > 0){
        return true;
    }else{
        return false;
    }
}

// Inserts data into MySQL Database
function insertData($username, $matchTime, $role, $winLoss){

  $conn = connectSQL(($GLOBALS['OS_sqlServer']), ($GLOBALS['OS_sqlUsername']), ($GLOBALS['OS_sqlPassword']), $GLOBALS['OS_database']);
  

  $sql = "INSERT INTO over_stat Values('$username', '$matchTime', '$role', '$winLoss');";

  if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }

  closeSQLConnection($conn);

}

function getWinLoss($username = 0, $role){

  $conn = connectSQL(($GLOBALS['OS_sqlServer']), ($GLOBALS['OS_sqlUsername']), ($GLOBALS['OS_sqlPassword']), $GLOBALS['OS_database']);
  

  if($username == 0){
    $sql = "Select DATE_FORMAT(match_time,  '%H:00') as Hour, CONCAT(ROUND((AVG(win_loss = 'W')*100), 2), '%') as Win_Rate from over_stat where player_role = '$role' group by EXTRACT(HOUR FROM match_time), player_role order by AVG(win_loss = 'W') desc limit 1;";
  }else{
  $sql = "Select DATE_FORMAT(match_time,  '%H:00') as Hour, CONCAT(ROUND((AVG(win_loss = 'W')*100), 2), '%') as Win_Rate from over_stat where username = '$username' and player_role = '$role' group by EXTRACT(HOUR FROM match_time), player_role order by AVG(win_loss = 'W') desc limit 1;";
  }
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      echo  $row["Hour"]. "   Win Rate: " .$row["Win_Rate"];
    }
  } else {
    echo "<b style = \"color : red; \">No Data found for the User: $username   :( </b>";
  }

  closeSQLConnection($conn);
}

function connectSQL($servername, $username, $password, $database){
  
  $conn = new mysqli($servername, $username, $password, $database);
  
  if (mysqli_connect_error()) {
    die("Database connection failed");
  }
  return $conn;
}

function selectSQLTable($conn, $table){

  $selTable = mysqli_select_db($conn, $table);

  if(!$selTable) {
    die('Could not select database');
  };
}

function closeSQLConnection($conn){
  $conn->close();
}



?>