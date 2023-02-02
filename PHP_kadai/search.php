<?php
session_start();
require_once('funcs.php');
require_once('common.php');
loginCheck();

$dsn='mysql:dbname=kadai;host=localhost;charset=utf8';
$user='root';
$password='';
$dbh=new PDO($dsn,$user,$password);
$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

if (isset($_POST["search"])) {

if (isset($_POST["e_school"]) && empty($_POST["j_school"]) && empty($_POST["h_school"])){
$e_school = $_POST["e_school"];
$j_school = '';
$h_school = '';
}

if (empty($_POST["e_school"]) && isset($_POST["j_school"]) && empty($_POST["h_school"])){
$e_school = '';
$j_school = $_POST["j_school"];
$h_school = '';
}

if (empty($_POST["e_school"]) && empty($_POST["j_school"]) && isset($_POST["h_school"])){
$e_school = '';
$j_school = '';
$h_school = $_POST["h_school"];
}

if (empty($_POST["e_school"]) && isset($_POST["j_school"]) && isset($_POST["h_school"])){
$e_school = $_POST[""];
$j_school = $_POST["j_school"];
$h_school = $_POST["h_school"];
}

if (isset($_POST["e_school"]) && empty($_POST["j_school"]) && isset($_POST["h_school"])){
$e_school = $_POST["e_school"];
$j_school = $_POST[""];
$h_school = $_POST["h_school"];
}

if (isset($_POST["e_school"]) && isset($_POST["j_school"]) && empty($_POST["h_school"])){
$e_school = $_POST["e_school"];
$j_school = $_POST["j_school"];
$h_school = $_POST[""];
}

if (isset($_POST["e_school"]) && isset($_POST["j_school"]) && isset($_POST["h_school"])){
$e_school = $_POST["e_school"];
$j_school = $_POST["j_school"];
$h_school = $_POST["h_school"];
}

$sql="SELECT * FROM school WHERE e_school like '%{$e_school}%' and j_school like '%{$j_school}%' and h_school like '%{$h_school}%'";
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);

}else{
$sql='SELECT * FROM school WHERE 1';
$rec = $dbh->prepare($sql);
$rec->execute();
$rec_list = $rec->fetchAll(PDO::FETCH_ASSOC);
}

$dbh=null;
?>

<!DOCTYPE html>
<html>
<head>

</head>
<?= head_parts('検索画面') ?>
<header>
    出身けんさ君
    <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="index.php">データ登録</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="select.php">データ一覧</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="login.php">ログイン</a></div>
                <div class="navbar-header"><a class="navbar-brand" href="logout.php">ログアウト</a></div>
            </div>
        </nav>
</header>
<style>
    table{
  border-collapse: collapse;
}

table tr{
  border-bottom: solid 2px white;
}

table tr:last-child{
  border-bottom: none;
}

table th{
  position: relative;
  text-align: left;
  background-color: #52c2d0;
  color: white;
  text-align: center;
  padding: 10px 0;
}

table th:after{
  display: block;
  top:calc(50% - 10px);
  right:-10px;
  border-left: 10px solid #52c2d0;
  border-top: 10px solid transparent;
  border-bottom: 10px solid transparent;
}

table td{
  text-align: left;
  text-align: center;
  background-color: #eee;
  padding: 10px 0;
}
</style>
<body>

<form action="search.php" method="POST">
<table border="1" style="border-collapse: collapse">
<div class="jumbotron">
<tr>
<th>小学校</th>
<td><input type="text" name="e_school" value="<?php if( !empty($_POST['e_school']) ){ echo $_POST['e_school']; } ?>"></td></td>
<th>中学校</th>
<td><input type="text" name="j_school" value="<?php if( !empty($_POST['j_school']) ){ echo $_POST['j_school']; } ?>"></td>
<th>高校</th>
<td><input type="text" name="h_school" value="<?php if( !empty($_POST['h_school']) ){ echo $_POST['h_school']; } ?>"></td>
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
<th>ID</th>
<th>名前</th>
<th>小学校</th>
<th>中学校</th>
<th>高校</th>
</tr>

<?php foreach ($rec_list as $rec) { ?>
<tr>
<td><?php echo $rec['id'];?></td>
<td><?php echo $rec['name'];?></td>
<td><?php echo $rec['e_school'];?></td>
<td><?php echo $rec['j_school'];?></td>
<td><?php echo $rec['h_school'];?></td>
</tr>
<?php } ?>
</table>

</body>
</html>