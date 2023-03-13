<?php
include("OS_Functions.php");
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <link rel="stylesheet" href="style.css?" />
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
      <a href="Enter-Data.php"><button>Enter Data</button></a>
      <a href="Your-Data.php"class="nav-active"><button>Your Data</button></a>
  
      </nav>
      
    </header>

    <form name = "battleTagEntry" method = "GET"><label for="BattleTag">Enter BattleTag:</label>
        <input type="text" id="battleTag" name = "battleTag"/></form>

    <?php 
    if($_GET){
    $battleTag = $_GET['battleTag'];
    }
    ?>

    <div>
      <div>
        <img src="Images/tank.png" alt="Tank Icon" />
      </div>
      &nbsp;
      <span>&nbsp;Your Best Time to Play Tank:
      </span>
      <?php
        if($_GET){
        getWinLoss($battleTag, "T");
        }else{
        }
      ?>
      &nbsp;
      

      <div>
        <img src="Images/OffenseIcon.webp" alt="Damage Icon" />
      </div>
      &nbsp;
      <span>Your Best Time to Play Damage: </span>
      <?php
      if($_GET){
        getWinLoss($battleTag, "D");
      }
      ?>

      <div>
        <img src="Images/SupportIcon.webp" alt="Support Icon" />
      </div>
      &nbsp;
      <span>Your Best Time to Play Support: </span>
      <?php
      if($_GET){
        getWinLoss($battleTag, "S");
      }
      ?>
    </div>
  </body>


</html>