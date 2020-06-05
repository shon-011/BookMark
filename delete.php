<?php
$id = $_GET["id"];


//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_book02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //２．データ登録SQL作成
$delete= $pdo->prepare("DELETE FROM book_mark WHERE  id=:id");
$delete->bindValue(':id',$id,PDO::PARAM_INT);
$status = $delete->execute();

$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
header("Location: select.php");
 

}
?>