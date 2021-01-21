<?php
    require_once "config.php";
    // Получить всю базу данных пользователей
    function getAlldata() {
        $db =  Connection::getConnection();
        $query_select_all = "SELECT * FROM users";

        $dataArr = array();
        $response = mysqli_query($db, $query_select_all);
        if($response) {
            $num_rows = mysqli_num_rows($response);
            for ($i=0;$i<$num_rows;$i++) {
                $row = mysqli_fetch_row($response); 
                $dataArr[$i]["id"] = $row[0];
                $dataArr[$i]["user_login"] = $row[1];
                $dataArr[$i]["user_email"] = $row[2];
                $dataArr[$i]["user_password"] = $row[3];
                $dataArr[$i]["user_firstname"] = $row[4];
                $dataArr[$i]["user_lastname"] = $row[5];
                $dataArr[$i]["user_birthday"] = $row[6];
            }
        }
        mysqli_close($db);
        return $dataArr;
    }

    // Получить user по ID
    function getUser($userId) {
        $db =  Connection::getConnection();
        $query_select_user = "SELECT * FROM users WHERE id='$userId'";
        
        $user = array();
        $response = mysqli_query($db, $query_select_user);

        if($response and mysqli_num_rows($response)) {
            $row = mysqli_fetch_row($response);
            $user += array(
                "id" => $row[0],
                "user_login" => $row[1],
                "user_email" => $row[2],
                "user_password" => $row[3],
                "user_firstname" => $row[4],
                "user_lastname" => $row[5],
                "user_birthday" => $row[6],
            );
        }

        mysqli_close($db);
        return $user;
    }

?>