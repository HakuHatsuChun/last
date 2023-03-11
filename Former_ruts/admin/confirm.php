<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/header_nav.php');

loginCheck();

$title = $_POST['title'];
$yoyaku = $_POST['yoyaku'];
$content = $_POST['content'];
$_SESSION['post']['title'] = $_POST['title'];
$_SESSION['post']['yoyaku'] = $_POST['yoyaku'];
$_SESSION['post']['content'] = $_POST['content'];

if (trim($title) === '' || trim($content) === '') {
    redirect('post.php?error');
}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <?= head_parts('Former Ruts') ?>
</head>

<body>
    <?=  $header_nav?>

    <form method="POST" action="register.php" enctype="multipart/form-data" class="mb-3">
        <div class="mb-3">
            <label for="title" class="form-label">タイトル</label>
            <input type="hidden"name="title" value="<?= $title ?>">
            <p><?= $title ?></p>
        </div>        
        
        <div class="mb-3">
            <label for="yoyaku" class="form-label">記事の要約</label>
            <input type="hidden"name="yoyaku" value="<?= $yoyaku ?>">
            <p><?= $yoyaku ?></p>
        </div>

        <div class="mb-3">
            <label for="content" class="form-label">記事内容</label>
            <input type="hidden"name="content" value="<?= $content ?>">
            <div><?= nl2br($content) ?></div>
        </div>
        <button type="submit" class="btn btn-primary">投稿</button>
    </form>

    <a href="post.php?re-register=true">前の画面に戻る</a>
</body>
</html>
