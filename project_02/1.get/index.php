<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Minh hoạ method GET</title>
</head>

<body>
    <h1>Lập trình web với PHP</h1>
    <form name="frmGET" action="./form_get.php" method="get">
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
                <button type="submit">Submit</button>
                <button>Reload</button>
            </p>
        </fieldset>
    </form>
</body>

</html>