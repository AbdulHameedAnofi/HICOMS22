<?php


function connection() {
    
    $active_group = 'default';
    $query_builder = TRUE;
    // mysql://b790d3e52dd8c0:fbe64c51@eu-cdbr-west-02.cleardb.net/heroku_f658271a9b91c34?reconnect=true
        try {
            $connection = new PDO("mysql:host=eu-cdbr-west-02.cleardb.net;dbname=heroku_f658271a9b91c34", 'b790d3e52dd8c0', 'fbe64c51');
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $th) {
            echo 'Connection failed:' . $th->getMessage();
        }
    
}

?>