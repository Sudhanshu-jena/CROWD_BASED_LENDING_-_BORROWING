<?php

class config{
    public static function conectphp(){
        $servername = "localhost";
        $username = "root";
        $password = "";

        try {
            $conn = new PDO("mysql:host=$servername;dbname=crowd_based", $username, $password);
  // set the PDO error mode to exception Dare@devil007 5t1wnM4XYWUJC2U9
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
           
            } catch(PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
            }
            return $conn ;

    }
}

?>