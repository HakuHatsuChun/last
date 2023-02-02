<?php
$name   = $_POST['name'];
$e_school  = $_POST['e_school'];
$j_school = $_POST['j_school'];
$h_school = $_POST['h_school'];

require_once('funcs.php');
$pdo = db_conn();

if (trim($name) === '' || trim($e_school) === ''|| trim($j_school) === ''|| trim($h_school) === '') {
    redirect('index.php?error');
}

$stmt = $pdo->prepare('INSERT INTO school(name,e_school,j_school,h_school,date)VALUES(:name,:e_school,:j_school,:h_school,sysdate());');
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':e_school', $e_school, PDO::PARAM_STR);
$stmt->bindValue(':j_school', $j_school, PDO::PARAM_STR);
$stmt->bindValue(':h_school', $h_school, PDO::PARAM_STR);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    redirect('index.php');
}
