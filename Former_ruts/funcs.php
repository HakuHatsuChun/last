<?php
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

function loginCheck()
{
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid'] != session_id()) {
        header('Location: login.php?login_error=1');
        exit();
    } else {
        session_regenerate_id(true);
        $_SESSION['chk_ssid'] = session_id();
    }
}

function db_conn()
{
    try {
        $db_name = 'gs_db5';
        $db_id   = 'root';
        $db_pw   = ''; 
        $db_host = 'localhost'; 
        $pdo = new PDO('mysql:dbname=' . $db_name . ';charset=utf8;host=' . $db_host, $db_id, $db_pw);
        return $pdo;
    } catch (PDOException $e) {
        exit('DB Connection Error:' . $e->getMessage());
    }
}

function sql_error($stmt)
{
    $error = $stmt->errorInfo();
    exit('SQLError:' . $error[2]);
}

function redirect($file_name)
{
    header('Location: ' . $file_name);
    exit();
}
function sschk()
{
}
