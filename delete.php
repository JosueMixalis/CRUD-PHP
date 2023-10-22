<?php
    require_once "pdo.php";
    session_start();

    if (!isset($_SESSION["name"]) || strlen($_SESSION["name"]<1)) {
        die("Not logged in");
    }


    if (isset($_POST['cancel'])) {
        header(('Location: index.php'));
        return;
    }

    $id = $_GET['autos_id'];

    $stmt = $pdo->prepare('SELECT make FROM autos WHERE autos_id = :id');
    $stmt->execute(array(':id'=>$id));
    $row = $stmt->fetch(PDO::FETCH_ASSOC);

    if (isset($_POST['delete'])) {
        $stmt = $pdo->prepare('DELETE FROM autos WHERE autos_id=:id');
        $stmt->execute(array(':id'=>$id));
        $_SESSION['success']="Record deleted";
        header("Location: index.php");
    }
?>

<!DOCTYPE html>
 <html>
     <head>
         <?php require_once "bootstrap.php";?>
         <title>Josue Mixalis Garcia Carbajal delete    </title>
     </head>
     <body>
         <div class="container">
             <h4>Confirm deleting: <?= $row['make'] ?></h4>
             <form  method="POST">
                 <p><input type="submit" name="delete"  value="Delete" >
                 <input type="submit" name="cancel" value="Cancel"></p>
            </form>
         </div>
     </body>
 </html>