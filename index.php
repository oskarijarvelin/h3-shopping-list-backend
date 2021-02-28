<?php
require_once 'inc/functions.php';
require_once 'inc/headers.php';

try {
    echo header('HTTP/1.1 200 OK');
    $db = openDB();
    $sql = "select * from item";
    $query = $db->query($sql);
    $results = $query->fetchAll(PDO::FETCH_ASSOC);
    echo json_encode($results);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
