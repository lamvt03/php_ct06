<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
    <link rel="stylesheet" href="css/style.css" />
</head>
<body>
    <div class="container">
        <form action="" class="form" method="get"
                id="frmRegForm" name="frmRegForm">
            <fieldset>
                <legend>Form Registration</legend>
                <div class="row">
                    <label for="firstName">First name</label>
                    <input id="firstName" name="firstName" type="text" minlength="2"/>
                </div>
                <div class="row">
                    <label for="lastName">Last name</label>
                    <input id="lastName" name="lastName" type="text"/>
                </div>
                <div class="row">
                    <label for="email">Email</label>
                    <input id="email" name="email" type="email"/>
                </div>
                <div class="row">
                    <label for="password">Password</label>
                    <input id="password" name="password" type="password"/>
                </div>
                <div class="row">
                    <label for="rePassword">Confirm Password</label>
                    <input id="rePassword" name="rePassword" type="password"/>
                </div>
                <div class="row">
                    <label for="comment">Comment</label>
                    <textarea id="comment" name="comment"></textarea>
                </div>
                <div class="row">
                    <input type="submit" class="register-btn" value="Register Button"/>
                </div>
            </fieldset>
        </form>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.20.0/jquery.validate.min.js" integrity="sha512-WMEKGZ7L5LWgaPeJtw9MBM4i5w5OSBlSjTjCtSnvFJGSVD26gE5+Td12qN5pvWXhuWaWcVwF++F7aqu9cvqP0A==" crossorigin="anonymous"></script>
    <script src="js/script.js"></script>
</body>
</html>