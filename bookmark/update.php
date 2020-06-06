<?php
session_start();
include("../funcs.php");
sic();

$id         = $_POST["id"];
$comment    = $_POST["comment"];


//DB接続
$pdo = db_con();

  //２．データ登録SQL作成
$update= $pdo->prepare("UPDATE book_mark SET comment=:comment WHERE  id=:id");

$update->bindValue(':comment',  $comment,PDO::PARAM_STR);
$update->bindValue(':id',       $id,PDO::PARAM_INT);
$status = $update->execute();

$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
header("Location: select.php");
 

}



?>