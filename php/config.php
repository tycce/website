<?php
    class Connection {
        private static $host = "localhost" ;
        private static $user = "n77206_tycce";
        private static $password = "Shkyra2324";
        private static $database = "n77206_fishcatalog";

        static function getConnection() {
            return mysqli_connect(self::$host, self::$user, self::$password, self::$database);
        }
    }
    
?>