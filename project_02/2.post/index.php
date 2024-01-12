<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minh hoạ method POST</title>
</head>

<body>
    <h1>Lập trình web với PHP</h1>
    <form name="frmPOST" action="./form_post.php" method="post">
        <fieldset>
            <legend>Thông tin người dùng</legend>
            <p>
                <label for="name">Họ tên:</label>
                <input name="name" id="name" type="text" 
                    placeholder="Nhập họ tên"/>
            </p>
            <p>
                <label for="email">Email:</label>
                <input name="email" id="email" type="email" 
                    placeholder="Nhập email"/>
            </p>
            <p>
                <label for="password">Email:</label>
                <input name="password" id="password" type="password" 
                    placeholder="Nhập mật khẩu"/>
            </p>
            <p>
                <button type="submit">Submit</button>
                <button>Reload</button>
            </p>
        </fieldset>
    </form>
</body>

</html>