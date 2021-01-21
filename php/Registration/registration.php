<?php header('Content-Type: text/html; charset=utf-8');?>
<?php
    $user_login = $_REQUEST['user_login'];
    $user_email = $_REQUEST['user_email'];
    $user_password = md5($_REQUEST['user_password']);
    $user_firstname = $_REQUEST['user_firstname'];
    $user_lastname = $_REQUEST['user_lastname'];
    $user_birthday = $_REQUEST['user_birthday'];

    $db = mysqli_connect("localhost", "n77206_tycce", "Shkyra2324", "n77206_fishcatalog") or die("ОШИБКА". mysqli_error($db));
    mysqli_set_charset($db,"utf8");
    $query_reg = "INSERT INTO users VALUES(NULL, '$user_login', '$user_email', '$user_password', '$user_firstname', '$user_lastname', '$user_birthday');";
    $response = mysqli_query($db, $query_reg);

    if($response) {
        echo json_encode(array('success' => 1));     
    } else {      
        echo json_encode(array('success' => 0));
        
    }

    mysqli_close($db);
?>