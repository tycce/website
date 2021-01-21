
<?php
    //Ищем Email в БД
    $user_email = $_REQUEST["input"];
    $db = mysqli_connect("localhost", "root", "", "fishcatalog") or die("Ошибка " . mysqli_error($db));
    $query_search_email = "SELECT * FROM users WHERE user_email='$user_email'";

    $email = "isNotHave";
    $response = mysqli_query($db, $query_search_email);
    if($response and mysqli_num_rows($response)) $email = "isHave";
    
    mysqli_close($db);
    echo json_encode(array('success'=> $email));
?>