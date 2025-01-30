<link rel="stylesheet" href="lab08.css"> 
<?php
// Problem #3

$image = $_POST["img"]; 
$one_day = time() + 86400;

if ($image) {
    setcookie('image', $image, $one_day, "/"); 
}

if ($image == "corn" || isset($_COOKIE['image']) && $_COOKIE['image'] == "corn") {
    echo "<img style = 'float: right; opacity: 0.5;' id = 'prob-3' src = 'images/corn.gif'><h2 style = 'text-align: right;'>Current Image: corn.pdf</h2></img>";
    echo "<br>";
} elseif ($image == "hat" || isset($_COOKIE['image']) && $_COOKIE['image'] == "hat") {
    echo "<img style = 'float: right; opacity: 0.5;' id = 'prob-3' src = 'images/hat.gif'><h2 style = 'text-align: right;'>Current Image: hat.pdf</h2></img>";
    echo "<br>";
} elseif ($image == "leaves" || isset($_COOKIE['image']) && $_COOKIE['image'] == "leaves") {
    echo "<img style = 'float: right; opacity: 0.5;' id = 'prob-3' src = 'images/leaves.gif'><h2 style = 'text-align: right;'>Current Image: leaves.pdf</h2></img>";
    echo "<br>";
} elseif ($image == "mailbox" || isset($_COOKIE['image']) && $_COOKIE['image'] == "mailbox") {
    echo "<img style = 'float: right; opacity: 0.5;' id = 'prob-3' src = 'images/mailbox.gif'><h2 style = 'text-align: right;'>Current Image: mailbox.pdf</h2></img>";
    echo "<br>";
} elseif ($image == "pumpkin" || isset($_COOKIE['image']) && $_COOKIE['image'] == "pumpkin") {
    echo "<img style = 'float: right; opacity: 0.5;' id = 'prob-3' src = 'images/pumpkin.gif'><h2 style = 'text-align: right;'>Current Image: pumpkin.pdf</h2></img>";
    echo "<br>";
} else {
    echo "<h2 style = 'text-align: right;'>First Visit - Cookie is not Set</h2>";
}

// Problem #1 

date_default_timezone_get("America/New_York"); 
$hour = date("H", time());
$time= date("h:i:sa");

if ($hour >= 5 && $hour < 12) {
	echo "<div style = 'background-image: url(images/morning.jpg); height: 200px'>"; 
	echo "<h1 id = 'black'>Good Morning!</h1>"; // black
    echo "<h2 id = 'black'>It is currently $time</h2>";
	echo "</div>"; 
}
elseif ($hour >= 12 && $hour < 17) {
	echo "<div style = 'background-image: url(images/afternoon.jpg); height: 200px'>"; 
	echo "<h1 id = 'white'>Good Afternoon!</h1>";
    echo "<h2 id = 'white'>It is currently $time</h2>"; // white 
	echo "</div>"; 
}
elseif ($hour >= 17 && $hour < 21) {
	echo "<div style = 'background-image: url(images/evening.jpg); height: 200px'>"; 
	echo "<h1 id = 'black'>Good Evening!</h1>";
    echo "<h2 id = 'black'>It is currently $time</h2>"; // black
	echo "</div>"; 
}	
else {
	echo "<div style = 'background-image: url(images/night.jpg); height: 200px'>"; 
	echo "<h1 id = 'white'>Good Night!</h1>";
    echo "<h2 id = 'white'>It is currently $time</h2>"; // white
	echo "</div>"; 
}
echo "<br><br>";

?>

<html>
    <head>
        <meta charset='utf-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <title>Page Title</title>
        <meta name='viewport' content='width=device-width, initial-scale=1'>
        <link rel="stylesheet" href="lab08.css"> 
    </head>
    <body>
        <form action = "lab08.php" method = "post">
            Enter Number 1: <input name = "num1" type = "text">
            Enter Number 2: <input name = "num2" type = "text"> 
            <input type = "submit"/>
        </form> 
        <div id = "mytable">

        </div>
        <form action = "lab08.php" method = "post">
            <img src = "images/corn.gif"> corn.gif <input value = "corn" name = "img" type = "radio"/> 
            <img src = "images/hat.gif"> hat.gif <input value = "hat" name = "img" type = "radio"/> 
            <img src = "images/leaves.gif"> leaves.gif <input value = "leaves" name = "img" type = "radio"/> 
            <img src = "images/mailbox.gif"> mailbox.gif <input value = "mailbox" name = "img" type = "radio"/> 
            <img src = "images/pumpkin.gif"> pumpkin.gif <input value = "pumpkin" name = "img" type = "radio"/> 
            <input type = "submit"/> 
        </form>
    </body>
</html>

<?php 
    // Problem #2 - Used JavaScript to generate the Multiplication table 
    $num_1 = $_POST["num1"];
    $num_2 = $_POST["num2"];

    if ($num_1 && $num_1 < 3 || $num_1 > 12) {
        echo "Number 1 Error - Please enter a number between 3 and 12";
        echo "<br>";
    } elseif ($num_2 && $num_2 < 3 || $num_2 > 12) {
        echo "Number 2 Error - Please enter a number between 3 and 12";
    } else {
        echo "<script type='text/JavaScript'>  
            let table_div = document.getElementById('mytable');
            let table = document.createElement('TABLE');
            table.border = '1';

            let table_body = document.createElement('TBODY');
            table.appendChild(table_body);

            let count = 0;

            for (let i = 0; i < $num_1; i++) { // create the rows 
                let table_row = document.createElement('TR');
                table_body.appendChild(table_row);

                for (let j = 1, multiply = 1; j <= $num_2; j++, multiply++) { // create the columns 
                    let num = (multiply += count);
                    let table_data = document.createElement('TD');
                    table_data.width = '75';
                    table_data.appendChild(document.createTextNode(num));
                    table_row.appendChild(table_data);
                }
                count += 1;  
            }
            table_div.appendChild(table);
     </script>"; 
    }
?>

