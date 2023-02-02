<?php
session_start();
require_once('funcs.php');
loginCheck();

$id = $_GET['id'];

require_once('funcs.php');
$pdo = db_conn();
$stmt = $pdo->prepare('DELETE FROM school WHERE id = :id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT); 
$status = $stmt->execute(); 

if ($status === false) {
    sql_error($stmt);
} else {
    redirect('select.php');
}
