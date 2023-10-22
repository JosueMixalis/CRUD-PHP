<?php
    require_once "pdo.php";
    session_start();

    if (!isset($_SESSION["name"]) || strlen($_SESSION["name"]<1)) {
        die("ACCESS DENIED");
    }


    if (isset($_POST['cancel'])) {
        header(('Location: index.php'));
        return;
    }

    if (isset($_POST['mileage']) && isset($_POST['year']) ) {
        if ((strlen($_POST['make']) < 1 || !isset($_POST['make'])) || (strlen($_POST['model']) < 1 || !isset($_POST['model']))) {
            $_SESSION['error'] = "All fields are required";
            header("Location: add.php");
            return;
        } elseif (!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])) {
            $_SESSION['error'] = 'Mileage and year must be numeric';
            header("Location: add.php");
            return;
        }else {
            $stmt = $pdo->prepare('INSERT INTO autos (make,model,year,mileage) VALUES (:make,:model,:year,:mileage)');
            $stmt->execute(array(
            ':make' => $_POST['make'],':model' => $_POST['model'],':year' =>$_POST['year'],':mileage' => $_POST['mileage']));
            $_SESSION['success']="Record added";
            header("Location: index.php");
        }
        
    } 
?>
 <!DOCTYPE html>
<html>
    <head>
        <?php require_once "bootstrap.php";?>
        <title>Josue Mixalis Garcia Carbajal Tracker</title>
    </head>
    <body>
        <div class="container">
            <h1>Tracking Autos for <?= htmlentities( $_SESSION['name'])?></h1>
            <?php
                if(isset($_SESSION['error']))  {
                    echo('<p style="color:red;">'.htmlentities($_SESSION['error'])."</p><br>");
                    unset($_SESSION['error']);
                }
            ?>
            <form  method="POST">
                <p><label for="make1">Make:</label>
                <input type="text" name="make" id="make1" size="60"></p>
                <p><label for="model1">Model:</label>
                <input type="text" name="model" id="model1" size="60"></p>
                <p><label for="year1">Year :</label>
                <input type="text" name="year" id="year1"  ></p>
                <p><label for="milage1">milage : </label>
                <input type="text" name="mileage" id="milage1"></p>
                <p><input type="submit"  value="Add" >
                <input type="submit" name="cancel" value="Cancel"></p>
            </form>
        </div>
    </body>
</html>