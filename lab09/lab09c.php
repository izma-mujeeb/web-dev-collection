<?php 
    $connect = mysqli_connect("localhost", "imujeeb", "XXXXXXXX", "imujeeb"); 

    if ($connect) {
        echo "<div>Connected to MySQL Database <b>$database</b></div>"; 
    } else {
        echo "Connected to MySQL Database Failed";
    }

    echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Pictures Taken in Ontario</h1>";

    $sql = "SELECT * FROM Photograph WHERE location='Ontario'";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
          echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Photograph:</h1>";
          echo "<div style = 'text-align: center;'>";
          echo "<img style = 'height: 150px; width: 200px;'src="; echo $row["url"]; 
          echo ">";
          echo "</div>";
          echo "<p style = 'text-align: center;'>Subject: "; echo $row["subject"]; echo "</p>";
          echo "<p style = 'text-align: center;'>Location: "; echo $row["location"]; echo "</p>";
          echo "<hr>";
        }
      } else {
        echo "No Ontario Images";
      }
      mysqli_close($connect);


?>