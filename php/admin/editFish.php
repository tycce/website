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

    $response = mysqli_query($db, "SELECT * FROM fish WHERE id = '$fish_id'");
 
    if($response && $action == "edit")  
        $query = "UPDATE fish 
        SET fish_name = '$fish_name', fish_price = '$fish_price', 
        fish_size = '$fish_size', fish_amount = '$fish_amount', 
        fish_type = '$fish_type', fish_form = '$fish_form', 
        fish_img = '$fish_img' 
        WHERE id='$fish_id'";  

    if(mysqli_query($db, $query)) {
        echo json_encode(array('success' => 1));     
    } else {
        echo json_encode(array('success' => 0));
        echo mysqli_error( $db );
        
    }
    mysqli_close($db);
?>