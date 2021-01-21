<?php header('Content-Type: text/html; charset=utf-8');?>
<?php
     $db = mysqli_connect("localhost", "n77206_tycce", "Shkyra2324", "n77206_fishcatalog") or die("ОШИБКА". mysqli_error($db));
     mysqli_set_charset($db,"utf8");

    $fish_id = $_REQUEST["fish_id"];   
    $action = $_REQUEST["action"];

    $response = mysqli_query($db, "SELECT * FROM fish WHERE id = '$fish_id'");
 
    if($response && $action == "remove") $query = "DELETE FROM fish WHERE id ='$fish_id'";      

    if(mysqli_query($db, $query)) {
        echo json_encode(array('success' => 1));     
    } else {
        echo json_encode(array('success' => 0));
        echo mysqli_error( $db );
        
    }
    mysqli_close($db);
?>