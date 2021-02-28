<?php
require_once 'inc/functions.php';
require_once 'inc/headers.php';

$input = json_decode( file_get_contents('php://input') );
$id = filter_var($input->id, FILTER_SANITIZE_NUMBER_INT);

try {
    echo header('HTTP/1.1 200 OK');
    $db = openDB();

    $query = $db->prepare('delete from item where id=(:id)');
    $query->bindValue(':id',$id,PDO::PARAM_INT);
    $query->execute();

    $data = array('id' => $id);
    echo json_encode($data);
} catch (PDOException $pdoex) {
    returnError($pdoex);
}
