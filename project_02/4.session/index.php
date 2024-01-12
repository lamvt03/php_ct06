<?php 
    require 'init_session.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Session</title>
</head>
<body>
    <h2>
        You are access:
        <?php 
            echo $_SESSION['counter'];
        ?>
        time(s)
    </h2>
    <?php if(isset($_SESSION['name'])): ?>
        <h2>Welcome 
            <?php 
                echo $_SESSION['name'];
            ?>
        </h2>
        Click here to <a href="logout.php">Logout</a>
    <?php else: ?>
        <h2>Please login first</h2>
        Click here to login <a href="login.php">Login</a>
    <?php endif; ?>
</body>
</html>