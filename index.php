<?PHP 
    require_once "pdo.php";
    session_start();
?>



<!DOCTYPE html>
<html>
<head>
<title>Josue Mixalis Garcia Carbajal - Autos Database cd914240</title>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">

</head>
<body>
<div class="container">
<h1>Welcome to the Automobiles Database</h1>
<p>
<?php
    if (!isset($_SESSION['name']) || empty($_SESSION['name'])) {    
        if( isset($_SESSION['error'])) {
            echo '<p style="color:red">'.$_SESSION['error']."</p><br>";
            unset($_SESSION["error"]);
        }
?>
    <div class="container">
        <h1>Please Log In</h1>
        <p><a href="login.php">Please log in</a></p>
        <p>Attempt to go to <a href="add.php">add data</a> without logging in</p>
    </div>
<?php
    }
    else {
        if( isset($_SESSION['success'])) {
            echo '<p style="color:green">'.$_SESSION['success']."</p><br>";
            unset($_SESSION["success"]);
        }
        $stmt = $pdo->query('SELECT make, model, year, mileage, autos_id FROM autos ');
        $rowCount = $stmt->rowCount();

        if ($rowCount == 0)
            echo '<p> no rows found <p>';
        else {
            echo ('<table border="1"> <br>') ;
            echo '<thead>';
            echo '<th>Make</th>';
            echo '<th>Model</th>';
            echo '<th>Year</th>';
            echo '<th>Mileage</th>';
            echo '<th>Action</th>';
            echo '</tr></thead>';
            while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                echo '<tr><td>';
                echo(htmlentities($row['make']));
                echo("</td><td>");
                echo(htmlentities($row['model']));
                echo("</td><td>");
                echo(htmlentities($row['year']));
                echo("</td><td>");
                echo(htmlentities($row['mileage']));
                echo("</td><td>");
                echo('<a href="edit.php?autos_id='.$row['autos_id'].'">Edit</a>/');
                echo('<a href="delete.php?autos_id='.$row['autos_id'].'">Delete</a>/');

            }
        }
        echo '</table>';
        echo '<p> <a href="add.php"> Add New Entry </a> </p>';
        echo '<p> <a href="logout.php"> Logout </a> </p>';
    }
?>
</div>
</body>
