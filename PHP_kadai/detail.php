<?php
session_start();
require_once('funcs.php');
require_once('common.php');
loginCheck();

$id = $_GET['id'];
require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM school WHERE id=:id;');
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

if ($status == false) {
    sql_error($stmt);
} else {
    $row = $stmt->fetch();
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
<?= head_parts('データ編集') ?>
</head>

<body>
<?php if (isset($_GET['error'])) : ?>
        <p class='text-danger'>記入内容を確認してください。</p>
<?php endif ?>
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
            </div>
        </nav>
    </header>

    <form method="POST" action="update.php">
        <div class="jumbotron">
            <fieldset>
                <legend>[編集]</legend>
                <label>　　　名前：<input type="text" name="name" value="<?= $row['name'] ?>"></label><br>
                <label>出身小学校：<input type="text" name="e_school" value="<?= $row['e_school'] ?>"></label><br>
                <label>出身中学校：<input type="text" name="j_school" value="<?= $row['j_school'] ?>"></label><br>
                <label>　出身高校：<input type="text" name="h_school" value="<?= $row['h_school'] ?>"></label><br>
                <input type="submit" value="編集">
                <input type="hidden" name="id" value="<?= $id ?>">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
