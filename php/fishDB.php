<?php
    require_once "config.php";

    function getMinPrice() {
        $db = Connection::getConnection();
        $dataDb = mysqli_query($db, "select min(fish_price) from fish");
        if ($dataDb) {
            $min_price = mysqli_fetch_row($dataDb);
        }       
        mysqli_close($db);
        return $min_price[0];
    }

    function getMaxPrice() {
        $db = Connection::getConnection();
        $dataDb = mysqli_query($db, "select max(fish_price) from fish");
        if ($dataDb) {
            $max_price = mysqli_fetch_row($dataDb);
        }       
        mysqli_close($db);
        return $max_price[0];
    }

    function getData() {       
        $db = Connection::getConnection();
        mysqli_set_charset($db,"utf8");
        $dataDb = mysqli_query($db, "select * from fish");
        

        if($dataDb)
        {
            $output = array();
            $i = 0;
            while($row = mysqli_fetch_row($dataDb)) {
                $output[$i]["id"] = $row[0];
                $output[$i]["fish_name"] = $row[1];
                $output[$i]["fish_price"] = $row[2];
                $output[$i]["fish_size"] = $row[3];
                $output[$i]["fish_amount"] = $row[4];
                $output[$i]["fish_type"] = $row[5];
                $output[$i]["fish_form"] = $row[6];
                $output[$i]["fish_img"] = $row[7];
                ++$i;
            }
            // очищаем результат
            mysqli_free_result($dataDb);
        }
        mysqli_close($db);
        return $output;
    }
?>