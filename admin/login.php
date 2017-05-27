<?php
    require_once("../resources/lib/core.php");

    if (isset($_POST['username'])) {
        if (isset($_POST['password'])) {
            $username = $_POST['username'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
            checkUser($username, $password);
        }
    }

    function checkExists($username, $password) {
        $core = Core::GetInstance();
            
        $query = $core->conn->prepare("SELECT 1 FROM `admin` WHERE `user` = :user and `pass` = :pass LIMIT 1");
        $query->execute( array(":user" => $username, ":pass" => $password) );
        
        if ($result = $query->fetch(PDO::FETCH_OBJ)) {
            return true;
        } else {
            return false;
        }

    }


    function checkUser($username, $hash_password) {
        $core = Core::GetInstance();
            
        $query = $core->conn->prepare("SELECT * FROM `admin` WHERE user = :user");
        $query->execute( array(":user" => $username) );

        if($results = $query->fetch(PDO::FETCH_OBJ)) {
            $pass = $results->pass;
            if (password_verify($_POST['password'], $pass)) {

               session_start(); 

                $_SESSION["username"] = $_POST['username']; 
                $_SESSION["password"] = $pass;

                setcookie("username", $_SESSION['username'], time()+60*60*24*100, "/"); 
                setcookie("password", $_SESSION['password'], time()+60*60*24*100, "/"); 

                echo "complete";

            } else {
                echo "incorrect";
            }
        } else {
            echo "incorrect";
        }
    }
?>