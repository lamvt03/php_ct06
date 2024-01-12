<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minh hoạ Cookie</title>
</head>
<body>
    <h2>Chào mừng</h2>

    <!-- nhúng PHP -->
    <?
        try {
            if(isset($_COOKIE['user'])){
                $username = $_COOKIE['user'];
                echo "Welcome " . $username;
            }else{
                die("You are not logged in");
            }
        } catch (Exception $e) {
            echo $e->getMessage;
        }
    ?>
</body>
</html>