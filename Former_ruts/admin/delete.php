<?php
require_once('../funcs.php');
session_start();
loginCheck();

$pdo = db_conn();
$id = $_GET['id'];
$stmt = $pdo->prepare("SELECT img FROM gs_content_table WHERE id=" . $id . ';');
$status = $stmt->execute();

if ($status) {
    $row = $stmt->fetch();
    $imgName = $row['img'];
    unlink('../images/' . $imgName);
}
$stmt = $pdo->prepare('DELETE FROM gs_content_table WHERE id = :id');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute(); 
if (!$status) {
    sql_error($stmt);
} else {
    redirect('main.php');
}
