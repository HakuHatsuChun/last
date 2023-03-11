<?php
session_start();
require_once('../funcs.php');
require_once('../common/head_parts.php');
require_once('../common/header_nav.php');

$dsn='mysql:dbname=gs_db5;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if (isset($_POST["search"])) {

if (isset($_POST["tag"]) && empty($_POST["category"]) && empty($_POST["content"])){
$tag = $_POST["tag"];
$category = '';
$content = '';
}

if (empty($_POST["tag"]) && isset($_POST["category"]) && empty($_POST["content"])){
$tag = '';
$category = $_POST["category"];
$content = '';
}

if (empty($_POST["tag"]) && empty($_POST["category"]) && isset($_POST["content"])){
$tag = '';
$category = '';
$content = $_POST["content"];
}

if (empty($_POST["tag"]) && isset($_POST["category"]) && isset($_POST["content"])){
$tag = $_POST[""];
$category = $_POST["category"];
$content = $_POST["content"];
}

if (isset($_POST["tag"]) && empty($_POST["category"]) && isset($_POST["content"])){
$tag = $_POST["tag"];
$category = $_POST[""];
$content = $_POST["content"];
}

if (isset($_POST["tag"]) && isset($_POST["category"]) && empty($_POST["content"])){
$tag = $_POST["tag"];
$category = $_POST["category"];
$content = $_POST[""];
}

if (isset($_POST["tag"]) && isset($_POST["category"]) && isset($_POST["content"])){
$tag = $_POST["tag"];
$category = $_POST["category"];
$content = $_POST["content"];
}

$sql="SELECT * FROM gs_content_table WHERE tag like '%{$tag}%' and category like '%{$category}%' and content like '%{$content}%'";
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);

}else{
$sql='SELECT * FROM gs_content_table WHERE 1';
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
}

$dbh=null;
?>

<!DOCTYPE html>
<html>
<head>
<?= head_parts('Former Ruts') ?>
</head>

<body>
<?= $header_nav ?>

<form action="search.php" method="POST">
<table border="1" style="border-collapse: collapse">
<div class="jumbotron">
<tr>
<th>タグ</th>
<td><input type="text" name="tag" value="<?php if( !empty($_POST['tag']) ){ echo $_POST['tag']; } ?>"></td></td>
<th>カテゴリー</th>
<td><input type="text" name="category" value="<?php if( !empty($_POST['category']) ){ echo $_POST['category']; } ?>"></td>
<th>キーワード</th>
<td><input type="text" name="content" value="<?php if( !empty($_POST['content']) ){ echo $_POST['content']; } ?>"></td>
<td><input type="submit" name="search" value="検索"></td>
</tr>
</div>
</table>
</form>
<br />

<?php if (isset($_POST["search"])) {?>
<a href="search.php">検索を解除</a><br />
<?php } ?>

<table border="1" style="border-collapse: collapse">
<tr>
<th>名前</th>
<th>タグ</th>
<th>カテゴリー</th>
<th>キーワード</th>
</tr>

<?php foreach ($rec_list as $rec) { ?>
<tr>
<td><?php echo $rec['name'];?></td>
<td><?php echo $rec['tag'];?></td>
<td><?php echo $rec['category'];?></td>
<td><?php echo $rec['content'];?></td>
</tr>
<?php } ?>
</table>

</body>
</html>