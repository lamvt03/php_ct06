<?
    require_once './classes/user.php';
    require_once './classes/database.php';
    require_once './config.php';

    $db = new Database(
        constant('DB_HOST'),
        constant('DB_NAME'),
        constant('DB_USER'),
        constant('DB_PASS')
    );
    $user = User::findUserById($db->getConn(), 1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Project 01</title>
</head>
<body>
    <h1>Connect MySQL and extract data</h1>
    <p>Username: <?= $user->username?></p>
    <p>Password: <?= $user->password?></p>
</body>
</html>