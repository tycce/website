<?php header('Content-Type: text/html; charset=utf-8');?>
<?php
     $db = mysqli_connect("localhost", "n77206_tycce", "Shkyra2324", "n77206_fishcatalog") or die("ОШИБКА". mysqli_error($db));
     mysqli_set_charset($db,"utf8");

    $fish_id = $_REQUEST["fish_id"];
    $fish_name = $_REQUEST["fish_name"];
    $fish_price = $_REQUEST["fish_price"];
    $fish_size = $_REQUEST["fish_size"];
    $fish_amount = $_REQUEST["fish_amount"];
    $fish_type = $_REQUEST["fish_type"];
    $fish_form = $_REQUEST["fish_form"];
    $fish_img = "img/fish/".$_REQUEST["fish_img"];
    $action = $_REQUEST["action"];

    $serch_fish = "SELECT * FROM fish 
    WHERE fish_name = '$fish_name' AND
    fish_price = '$fish_price' AND
    fish_size = '$fish_size' AND
    fish_type = '$fish_type' AND
    fish_form = '$fish_form' AND
    fish_img = '$fish_img'";

    $success = 0;

    $response = mysqli_query($db, $serch_fish);
    $num_rows = mysqli_num_rows($response);
    if($num_rows == 0 && $action == "add" && $fish_id == 0) {
        $query = "INSERT INTO fish 
        VALUES(NULL, '$fish_name', '$fish_price', '$fish_size', '$fish_amount', '$fish_type', '$fish_form', '$fish_img');";
        $success = 1;
        $fish_id_query = mysqli_fetch_row(mysqli_query($db, "SELECT id FROM fish WHERE id = (SELECT max(id) FROM fish);"));
    }
    elseif($num_rows != 0 && $action == "add" && $fish_id == 0) {
        $row = mysqli_fetch_row($response);
        $now_fish_amount = $fish_amount + $row[4];
        $query = "UPDATE fish SET fish_amount = '$now_fish_amount' WHERE id = '$row[0]';";
        $success = 2;
        $fish_id_query = $row[0];
    }

    if(mysqli_query($db, $query)) {
        echo json_encode(array('success' => $success, 'fish_id' => $fish_id_query));     
    } else {      
        $success = 0;  
        echo json_encode(array('success' => $success));
        echo mysqli_error( $db );    
    }
    mysqli_close($db);
?>

