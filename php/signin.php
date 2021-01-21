<?php
    session_start();
    header('Content-Type: text/html; charset=utf-8');
    if($_SESSION['admin']){
        header("Location: admin.php");
        exit;
    } else if($_SESSION['user']) {
        header("Location: index.php");
        exit;
    }
    require_once "config.php";

    // 1 - admin
    // 2 - user
    // 3 - Не правильный логин или пароль
    
    $loginOrEmail = $_REQUEST["loginOrEmail"];
    $password = md5($_REQUEST["password"]);

    $db = Connection::getConnection();
    $result = mysqli_num_rows(mysqli_query($db, "SELECT * from users where (user_login = '$loginOrEmail' OR user_email = '$loginOrEmail') AND user_password = '$password';"));
    
    if($result) {
        if($loginOrEmail == "admin") {
            echo json_encode(array('success' => 1));          
            $_SESSION['admin'] = $loginOrEmail;          
        }
        else {
            echo json_encode(array('success' => 2));
            $_SESSION['user'] = $loginOrEmail;       
        }
    } else echo json_encode(array('success' => 3));
    
    mysqli_close($db);
?>