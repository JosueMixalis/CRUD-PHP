<?php
    session_start();
    require_once "pdo.php";

    $lastMessageP = '';
    $lastMessageW = '';

    if (isset($_POST['cancel'])) {
        header("Location: index.php");
        return;
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["email"]) && isset($_POST["pass"])){

        $salt = "XyZzy12*_";
        $stored_hash = "1a52e17fa899cf40fb04cfc42e6352f1";
        $lastMessageP = '';
        $lastMessageW = '';

        if (strlen($_POST["email"])<1 || strlen($_POST["pass"])<1) {
            $_SESSION["error"] = "Email and password are required";  
            header("Location: login.php");
            return;
          } 
          elseif (!strpos($_POST["email"],"@")) {
            $_SESSION["error"] = "Email must have an at-sign (@)";
            header("Location: login.php");
            return;
          } else {
            $check = hash('md5',$salt.$_POST['pass']);
            if ($check == $stored_hash) {
                error_log("Login success ".$_POST['email']);
                $Sql = ("");
                $_SESSION['name'] = $_POST["email"];
                header("Location: index.php");
                return;
          } else {
            $_SESSION["error"] = "Incorrect password";  
            error_log("Login fail".$_POST["email"].$check);
            $lastMessageP = $_POST['pass'];
            $lastMessageW = $_POST['email'];
          }

    }}
?>

<!DOCTYPE html>
<html>
    <head>
        <?php require_once "bootstrap.php"; ?>
        <title>JOSUE MIXALIS GARCIA CARBAJAL Login Page</title>
    </head>
    <body>
        <div class="container">
            <h1>Please log in</h1>
            <?php
                if (isset($_SESSION["error"])) {
                    echo('<p style="color: red;">'.htmlentities($_SESSION["error"])."</p><br>");
                    unset($_SESSION["error"]);
                }
            ?>
            <form method="POST">
                <label for="nam">User name</label>
                <input type="text" name="email" id="email" value= '<?= htmlentities($lastMessageW)?>' ><br>
                <label for="passW">Password</label>
                <input type="text" name="pass" id="pass" value= '<?= htmlentities($lastMessageP)?>'><br>
                <input type="submit" value="Log In">
                <input type="submit" name="cancel" value="Cancel">
            </form>
        </div>  
    </body>
</html>