<?php
if (isset($_COOKIE["cookiestudentcode"])) {
    header('location: home_student.php');
}

?>
<html>

<head>

    <title></title>
    <link rel="stylesheet" type="text/css" href="../style/login_style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Ubuntu|Lora">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <meta name="viewport" content="width=device-width" />

</head>

<body class="bg">
    <div class="login-box">
        <p class="text-login">LOGIN</p>
        <div class="container">
            <form action="checklogin.php" method="POST">
                <input type="text" name="username" id="username" class="form-control form-control-lg login-input" placeholder="Username">
                <br>
                <input type="password" name="password" id="password" class="form-control form-control-lg login-input" placeholder="Password">
                <br>
                <br>
                <div class="button-div">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">LOGIN</button>
                </div>
            </form>
            <div class="button-div">
                <button class="register-button" onclick="window.location.href='register_student.html'">REGISTER</button>
            </div>
            <br>
            <div class="button-div">
                <button class="register-button" onclick="window.location.href='../'">BACK</button>
            </div>


        </div>
    </div>

</body>

</html>