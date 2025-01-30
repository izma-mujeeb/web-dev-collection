<?php 
    $connect = mysqli_connect("localhost", "imujeeb", "XXXXXXXX", "imujeeb"); 

    if ($connect) {
        echo "<div>Connected to MySQL Database <b>$database</b></div>"; 
    } else {
        echo "Connected to MySQL Database Failed";
    }

    // Problem #1 

    echo "<h1>Problem #1</h1>";
    echo "<h2>I am pre-programming the records - look at the code";

    mysqli_query($connect,'TRUNCATE TABLE Photograph');  // since i am pre-programming the values, i will empty the database to avoid duplicate values


    $sql = "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Airplane', 'Quebec', '2004-12-22', 'images/airplane.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url)
    VALUES ('Apartment', 'Ontario', '2005-11-21', 'images/apartment.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Bridge', 'Manitoba', '2011-09-30', 'images/bridge.png');";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Brownies', 'British Columbia', '2015-02-04', 'images/brownies.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Building', 'Ontario', '2017-05-12', 'images/building.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Cake', 'Quebec', '2016-09-15', 'images/cake.jpg');";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Flower', 'New Brunswick', '2013-06-25', 'images/flower.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Rollercoaster', 'British Columbia', '2016-07-25', 'images/rollercoaster.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Tree', 'Manitoba', '2007-05-26', 'images/tree.jpg'); ";

    $sql .= "INSERT IGNORE INTO Photograph (subject, location, date, url) 
    VALUES ('Truck', 'Ontario', '2007-01-11', 'images/truck.jpg'); ";

    if (mysqli_multi_query($connect, $sql)) {
         echo "<h3> 10 Photograph Records Successfully Added!</h3>";
    } else {
         echo "<h3>Error " . mysqli_error($connect) . "</h3>";
    }

?>