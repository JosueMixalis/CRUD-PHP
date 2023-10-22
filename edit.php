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

     $stmt = $pdo->prepare('SELECT make,model,year,mileage FROM autos WHERE autos_id = :id');
     $stmt->execute(array(':id'=>$id));
     $row = $stmt->fetch(PDO::FETCH_ASSOC);
 
     if (isset($_POST['mileage']) && isset($_POST['year']) ) {
         if(!is_numeric($_POST['mileage']) || !is_numeric($_POST['year'])){
             $_SESSION['error'] ='Mileage and year must be numeric';
             header("Location: edit.php?autos_id=".$id);
             return;
         } elseif(strlen($_POST['make'])<1 || !isset($_POST['make'])) {
             $_SESSION['error']="Make is required";
             header("Location: edit.php?autos_id=".$id);
             return;
         }elseif(strlen($_POST['model'])<1 || !isset($_POST['model'])){
             $_SESSION['error']="Model is required";
             header("Location: edit.php?autos_id=".$id);
             return;  
         }else {
             $stmt = $pdo->prepare('UPDATE autos SET make=:make,model=:model,year=:year,mileage=:mileage WHERE autos_id = :id');
             $stmt->execute(array(
             ':make' => $_POST['make'],':model' => $_POST['model'],':year' =>$_POST['year'],':mileage' => $_POST['mileage'],':id' => $id));
             $_SESSION['success']="Record inserted";
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
             <h1>Editing Automobile</h1>
             <?php
                 if(isset($_SESSION['error']))  {
                     echo('<p style="color:red;">'.htmlentities($_SESSION['error'])."</p><br>");
                     unset($_SESSION['error']);
                 }
             ?>
             <form  method="POST">
                 <p><label for="make1">Make:</label>
                 <input type="text" name="make" id="make1" size="60" value=<?= htmlentities($row['make'])?>></p>
                 <p><label for="model1">Model:</label>
                 <input type="text" name="model" id="model1" size="60"value=<?= htmlentities($row['model'])?>></p>
                 <p><label for="year1">Year :</label>
                 <input type="text" name="year" id="year1"  value=<?= htmlentities($row['year'])?>></p>
                 <p><label for="milage1">milage : </label>
                 <input type="text" name="mileage" id="mileage1" value=<?= htmlentities($row['mileage'])?>></p>
                 <p><input type="submit"  value="Save" >
                 <input type="submit" name="cancel" value="Cancel"></p>
             </form>
         </div>
     </body>
 </html>