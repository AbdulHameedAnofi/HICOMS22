<?php


$active_group = 'default';
$query_builder = TRUE;

function connection() {
    
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url['host'];
    $cleardb_username = $cleardb_url['user'];
    $cleardb_password = $cleardb_url['pass'];
    $cleardb_db = substr($cleardb_url['path'], 1);
    // mysql://b790d3e52dd8c0:fbe64c51@eu-cdbr-west-02.cleardb.net/heroku_f658271a9b91c34?reconnect=true
        try {
            $connection = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db", $cleardb_username, $cleardb_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $th) {
            echo 'Connection failed:' . $th->getMessage();
        }
    
}

?>