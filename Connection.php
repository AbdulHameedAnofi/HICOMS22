<?php


$active_group = 'default';
$query_builder = TRUE;

function connection() {
    
    $cleardb_url = parse_url(getenv("CLEARDB_DATABASE_URL"));
    $cleardb_server = $cleardb_url['host'];
    $cleardb_username = $cleardb_url['user'];
    $cleardb_password = $cleardb_url['pass'];
    $cleardb_db = substr($cleardb_url['path'], 1);
    
        try {
            $connection = new PDO("mysql:host=$cleardb_server;dbname=$cleardb_db", $cleardb_username, $cleardb_password);
            $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            return $connection;
        } catch (PDOException $th) {
            echo 'Connection failed:' . $th->getMessage();
        }
    
}

?>
