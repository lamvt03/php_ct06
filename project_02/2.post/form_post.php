<?
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];

    if($password == "abc123"){
        echo "Chào " . $name . " - " . $email;
    }else{
        echo "Vui lòng đăng ký thành viên";
    }
?>