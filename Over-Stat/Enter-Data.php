<?php
include("OS_Functions.php");
?>



<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css" />
    <script src="main.js"></script>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Over-Stat</title>
  </head>

  <body>
    <header>
      <nav>
      <p class = "banner" href="home.php">OVER-STAT</p>
        <a href="home.php"><button>Global</button></a>
        <a href="Enter-Data.php"
          ><button class="nav-active">Enter Data</button></a>
        <a href="Your-Data.php"><button>Your Data</button></a>
      </nav>
    </header>

    <div>
      <form class = "enter-data" name="battleTagEntry" method = "POST">
        <br>
        <label for="BattleTag">Enter BattleTag:</label>
        <input type="text" id="battleTag" name = "battleTag" />
        <br>

        <br>
        <label for="matchTime"
          >
Enter Match Time in Miliatary Time (Ex. 23:12):</label
        >
        <input type="text" id="matchTime" name = "matchTime"/>
        <br>

        <br>
        <label for="role">Enter Role:</label>
        <select id="role" name = "role">
          <option value="T">Tank</option>
          <option value="D">Damage</option>
          <option value="S">Support</option>
        </select>
        <br>

        <br>
        <label for="Win/Loss">Enter Role:</label>
        <select id="winLoss" name = "winLoss">
          <option value="W">Win</option>
          <option value="L">Loss</option>
        </select>
        <br>

        <br>
        <input type="submit" value="Submit">
        
        
      </form>

      <?php
        
        if($_POST){
        $battleTag = ($_POST['battleTag']);
        $matchTime= ($_POST['matchTime']);
        $role = ($_POST['role']);
        $winLoss = ($_POST['winLoss']);
        echo "\n$battleTag, $matchTime, $role, $winLoss  was entered\n";
        insertData($battleTag, $matchTime, $role, $winLoss);
        }
        ?>
        
    </div>
  </body>
</html>
