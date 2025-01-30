<?php 
    $connect = mysqli_connect("localhost", "imujeeb", "XXXXXXXX", "imujeeb"); 

    if ($connect) {
        echo "<div>Connected to MySQL Database <b>$database</b></div>"; 
    } else {
        echo "Connected to MySQL Database Failed";
    }

    $sql = "SELECT * FROM Photograph ORDER BY date DESC";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Photograph:</h1>";
          echo "<p style = 'text-align: center;'>Number: "; echo $row["number"]; echo "</p>";
          echo "<p style = 'text-align: center;'>Subject: "; echo $row["subject"]; echo "</p>";
          echo "<p style = 'text-align: center;'>Location: "; echo $row["location"]; echo "</p>";
          echo "<p style = 'text-align: center;'>Date: "; echo $row["date"]; echo "</p>";
          echo "<p style = 'text-align: center;'>URL: "; echo $row["url"]; echo "</p>";
          echo "<hr>";
        }
      } else {
        echo "No results.";
      }
      mysqli_close($connect);


?>