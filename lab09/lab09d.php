<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Lab 09 - Part d</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
    </head>
    <body> 
        <form action = "lab09d.php" method = "post"> 
            <h1>Enter a Year</h1>
            <input type = "radio" name = "year" value = "2017"> 2017 
            <input type = "radio" name = "year" value = "2016"> 2016 
            <input type = "radio" name = "year" value = "2015"> 2015 
            <input type = "radio" name = "year" value = "2013"> 2013 
            <input type = "radio" name = "year" value = "2011"> 2011 
            <input type = "radio" name = "year" value = "2007"> 2007 
            <input type = "radio" name = "year" value = "2005"> 2005 
            <input type = "radio" name = "year" value = "2004"> 2004 
            <h1>Enter a Location</h1>
            <input type = "radio" name = "location" value = "Ontario"> Ontario
            <input type = "radio" name = "location" value = "Quebec"> Quebec
            <input type = "radio" name = "location" value = "British Columbia"> British Columbia
            <input type = "radio" name = "location" value = "New Brunswick"> New Brunswick 
            <input type = "radio" name = "location" value = "Manitoba"> Manitoba 
            <input type = "submit"/>
        </form>
    </body> 
</html>

<?php 
    
    $year = $_POST["year"];
    $location = $_POST["location"];

    if ($year && !$location) {
        echo '<script>alert("Please enter a location");</script>';
    }

    if (!$year && $location) {
        echo '<script>alert("Please enter a year");</script>';
    }

    $connect = mysqli_connect("localhost", "imujeeb", "XXXXXXXX", "imujeeb"); 

    if ($connect) {
        echo "<div>Connected to MySQL Database <b>$database</b></div>"; 
    } else {
        echo "Connected to MySQL Database Failed";
    }

    if ($year && $location) {
        $sql = "SELECT * FROM Photograph WHERE location='$location' AND date LIKE '{$year}%'";
        $result = mysqli_query($connect, $sql);
        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_assoc($result)) {
              echo "<h1 style = 'text-align: center; color: purple; font-family: verdana;'>Photograph:</h1>";
              echo "<div style = 'text-align: center;'>";
              echo "<img style = 'height: 150px; width: 200px;'src="; echo $row["url"]; 
              echo ">";
              echo "</div>";
              echo "<p style = 'text-align: center;'>Date: "; echo $row["date"]; echo "</p>";
              echo "<p style = 'text-align: center;'>Location: "; echo $row["location"]; echo "</p>";
              echo "<hr>";
            }
        } else {
            echo "<h1>No photographs with location of $location and year of $year</h1>";
        }
    } else {
        echo "No results.";
      }
      mysqli_close($connect);


?>