<!doctype html>

<?php
    session_start();
    require_once('login.php');
    
    if(isset($_SESSION['username']) and isset($_SESSION['password'])) {
        if (checkExists($_SESSION['username'], $_SESSION['password'])) {
            header('Location: home');
        } else {
        }
    }
?>
<html>
	<head>
		<meta charset="UTF-8">
		<meta name=viewport content="width=device-width, initial-scale=1">
		<title>Autosoul - Admin Login</title>
		<!-- Main CSS -->
        <link rel="stylesheet" type="text/css" href="../resources/css/main.css"/>
        <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.0/themes/base/jquery-ui.css">

		<!-- Javascript Link -->
        <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3/jquery.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js" type="text/javascript" charset="utf-8"></script>
        <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.9.2/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>

        <script>
            $(function() {
                $(".admin-login-button").click(function() {
                    var username = $(".admin-username").val();
                    var password = $(".admin-password").val();
                    $.ajax(
                    {
                        type: "POST",
                        url: "login.php",
                           data: { username: username, password: password },
                        success: function(data) {
                           if (jQuery.trim(data) === "complete") {
                                window.location.href = "home";
                           } else if (jQuery.trim(data) === "incorrect") {
                                alert('Incorrect Username/Password');
                                $(".admin-password").val("");
                                $(".admin-username").val("");
                           }
                        }
                    });
                });
            });
        </script>
    </head>

    <body class="black">
        <div class="nav">
            <div class="menu-icon"> </div>
            <h1>Autosoul</h1>
            <ul>
                <li><a href="">News</a></li>
                <li><a href="">Social</a></li>
                <li><a href="">About</a></li>
            </ul>
        </div>

        <div class="admin-wrapper">
            <div class="login-box">
                <img class="autosoul" src="../resources/images/signup/autosoul-logo.png"/>
                <p class="admin-motto"> Admin </p>
                <input type="text" id="admin-username" class="admin-username" placeholder="Username">
                <input type="password" id="admin-password" class="admin-password" placeholder="Password">
                <div class="admin-login-button">
                    <p> Sign In </p>
                </div>
                <p> © 2016 Autosoul </p>
            </div>
        </div>
    </body>

</html>
