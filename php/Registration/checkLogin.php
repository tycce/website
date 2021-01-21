<?php
    //Ищем Логин в БД
    $user_login = $_REQUEST["input"];
    $db = mysqli_connect("localhost", "root", "", "fishcatalog") or die("Ошибка " . mysqli_error($db));
    $query_search_login = "SELECT * FROM users WHERE user_login='$user_login'";

    $login = "isNotHave";
    $response = mysqli_query($db, $query_search_login);
    if($response and mysqli_num_rows($response)) $login = "isHave";
    
    mysqli_close($db);
    echo json_encode(array('success'=> $login));
?>