<?php 
     $connect = mysqli_connect("localhost", "imujeeb", "XXXXXXXX", "imujeeb"); 

     if ($connect) {
         echo "<div>Connected to MySQL Database <b>$database</b></div>"; 
     } else {
         echo "Connected to MySQL Database Failed";
     } 
    
    echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Random Image in the database</h1>";

    $number = rand(1, 10);

    $sql = "SELECT * FROM Photograph WHERE number=$number";
    $result = mysqli_query($connect, $sql); 

    if (mysqli_num_rows($result) > 0) {
        while($row = mysqli_fetch_assoc($result)) {
            echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Photograph:</h1>";
            echo "<div style = 'text-align: center;'>";
            echo "<img style = 'height: 150px; width: 200px;'src="; echo $row["url"]; 
            echo ">";
            echo "</div>";
            echo "<p style = 'text-align: center;'>Number: "; echo $row["number"]; echo "</p>";
            echo "<p style = 'text-align: center;'>Subject: "; echo $row["subject"]; echo "</p>";
            echo "<p style = 'text-align: center;'>Location: "; echo $row["location"]; echo "</p>";
            echo "<p style = 'text-align: center;'>Year: "; echo $row["date"]; echo "</p>";
        }
      } else {
        echo "No results.";
      }

    $query = "SELECT * FROM Photograph";
    $query_result = mysqli_query($connect, $query);
    $images = 0;

    if (mysqli_num_rows($query_result) > 0) {
        while($row = mysqli_fetch_assoc($query_result)) {
            $images += 1;
        }
      } else {
        echo "No results.";
      }

    echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>The total number of images in the database is $images"; 

    mysqli_close($connect);
?>