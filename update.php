<?php
$id         = $_POST["id"];
$bookName   = $_POST["name"];
$comment    = $_POST["comment"];


//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_book;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //２．データ登録SQL作成
$update= $pdo->prepare("UPDATE gs_bm_table SET bookName=:bookName,comment=:comment WHERE  id=:id");
$update->bindValue(':bookName', $bookName,PDO::PARAM_STR);
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