<?
    // require 'config.php';
    // require 'classes/database.php';
    // require 'classes/user.php';

    require 'inc/init.php';

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $username = $_POST['username'];
        $password = $_POST['password'];

        // echo $username . ' ' . $password;
        
        $conn = require 'inc/db.php';
        $user = new User($username, $password);
        if($user->addUser($conn)){
            echo "Them user thanh cong";
        }else echo "Them user that bai";
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form name="frmPOST" action="" method="post">
        <fieldset>
            <legend>
                User details
            </legend>
            <p>
                <label for="username">Username:</label>
                <input type="username" name="username" id="username" placeholder="Nhập username" />
            </p>

            <p>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password" placeholder="Nhập password" />
            </p>

            <p>
                <input type="submit" value="Login">
                <input type="reset" value="Reset">
            </p>

        </fieldset>
    </form>
</body>
</html>