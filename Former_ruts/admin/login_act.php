<?php
session_start();
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];

if ($lid === '') {
    $not_lid = true;
}
if ($lpw === '') {
    $not_lpw = true;
}

if ($not_lid || $not_lpw) {
    header('Location: login.php?form_empty=1');
    exit();
}

require_once('../funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM gs_user_table WHERE lid = :lid');
$stmt->bindValue(':lid', $lid, PDO::PARAM_STR);
$status = $stmt->execute();

if (!$status) {
    sql_error($stmt);
}

$val = $stmt->fetch();

if ($val['id'] != '' && password_verify($lpw, $val['lpw'])) {
    $_SESSION['chk_ssid']  = session_id();
    $_SESSION['kanri_flg'] = $val['kanri_flg'];
    $_SESSION['name']      = $val['name'];
    header('Location:main.php');
} else {
    header('Location: login.php?form_validation=1');
}
