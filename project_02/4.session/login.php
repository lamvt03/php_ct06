<?php
require('init_session.php');

$serverPath = $_SERVER['DOCUMENT_ROOT'];
require $serverPath . '\\classes\\user.php';
require $serverPath . '\\classes\\database.php';
require $serverPath . '\\config.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $db = new Database(
        constant('DB_HOST'),
        constant('DB_NAME'),
        constant('DB_USER'),
        constant('DB_PASS')
    );
    $user = User::findByUsernameAndPassword($db->getConn(), $username, $password);
    if ($user) {
        // create session
        $_SESSION['id'] = $user->id;
        $_SESSION['name'] = $username;
    } else {
        $message = 'Invalid username or password';
    }
}

if (isset($_SESSION['id'])) {
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <h1>Đăng nhập hệ thống</h1>
    <form name="frmPOST" action="" method="post">
        <div class="msg">
            <?php
            if ($message !== '') {
                echo $message;
            }
            ?>
        </div>
        <fieldset>
            <legend>
                Thông tin đăng nhập
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