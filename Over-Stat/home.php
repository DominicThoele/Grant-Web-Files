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
        <a href="home.php"><button class="nav-active">Global</button></a>
        <a href="Enter-Data.php"><button>Enter Data</button></a>
        <a href="Your-Data.php"><button>Your Data</button></a>
      </nav>
    </header>
    <div>
      <div class = "role-section">
        <img src="Images/tank.png" alt="Tank Icon" />
        <br>
      <span>&nbsp;Global Best Time to Play Tank: </span>
      <?php 
      getWinLoss(null, "T");       
      ?>
      </div>

      <div class = "role-section">
        <img src="Images/OffenseIcon.webp" alt="Damage Icon" />
        <br>
      <span>Global Best Time to Play Damage: </span>
      <?php 
      getWinLoss(null, "D");       
      ?>
      </div>

      <div class = "role-section">
        
        <img src="Images/SupportIcon.webp" alt="Support Icon" />
        <br>
      <span>Global Best Time to Play Support: </span>
      <?php 
      getWinLoss(null, "D");       
      ?>
    
      </div>
    </div>
  </body>
</html>
