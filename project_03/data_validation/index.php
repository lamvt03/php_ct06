<?
    $nameError = "";
    $emailError = "";
    $websiteError = "";
    if(isset($_POST['submit'])){
        if(empty($_POST['name'])){
            $nameError = "Name is required";
        }else{
            $name = $_POST['name'];
            if(!preg_match("/^[A-Za-z]*$/", $name)){
                $nameError = 'Only characters and spaces are allowed';
            }
        }
        if(empty($_POST['email'])){
            $emailError = "Email is required";
        }else{
            $email = $_POST['email'];
            if(!preg_match("/^\S+@\S+\.\S+$/", $email)){
                $emailError = 'Email is invalid';
            }
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Validation</title>
    <style>
        .error {color: red;}
    </style>
</head>
<body>
<form action="" class="form" method="post"
                id="frmRegForm" name="frmRegForm">
            <fieldset>
                <legend>* Please fill out the following fields</legend>
                <p>
                    <label for="name">Name</label>
                    <input id="name" name="name" type="text" placeholder="Your name"/>
                    <? echo "<span class='error'> $nameError </span>"?>
                </p>
                <p>
                    <label for="email">Email</label>
                    <input id="email" name="email" type="text" placeholder="Your Email"/>
                    <? echo "<span class='error'> $emailError </span>"?>
                </p>
                <p>
                    <button name="submit" type="submit">Submit</button>
                </p>
            </fieldset>
        </form>
</body>
</html>