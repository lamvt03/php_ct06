<?
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $username = $_POST['username'];
        $password = $_POST['password'];

        if($username == "truonglam_00" && $password == "abc123"){
            $cookieName = "user";
            $cookieValue = $username;

            setcookie($cookieName, $cookieValue, time() + 60);
        }

        header("Location: index.php");
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>
</head>
<body>
    <h2>Đăng nhập hệ thống</h2>
    <form name="frmLOGIN" action="" method="post">
        <fieldset>
            <legend>Thông tin người dùng</legend>
            <p>
                <label for="username">Email:</label>
                <input name="username" id="username" type="text" 
                    placeholder="Nhập tên đăng nhập"/>
            </p>
            <p>
                <label for="password">Email:</label>
                <input name="password" id="password" type="password" 
                    placeholder="Nhập mật khẩu"/>
            </p>
            <p>
                <button type="submit">Submit</button>
                <button>Cancel</button>
            </p>
        </fieldset>
    </form>
</body>
</html>