<?php
session_start();
include("../funcs.php");
sic();

$id = $_GET["id"];



//DB接続
$pdo = db_con();

  //２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_mark WHERE id=:id");
$stmt->bindValue(':id',$id,PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
$row = $stmt->fetch();
 

}


?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>編集画面</title>
</head>
<body>

<form action="update.php" method="post">
  <h2><?=$row[1]?></h2>
  <img src="<?=$row[2]?>" >
<label >コメント：<textArea type="text" name="comment"　row="4" cols="40"><?=$row[4]?></textArea></label><br>
<input type="hidden" name="id" value="<?=$row['id']?>">
<input type="submit" value="更新">
</form>
</body>
</html>