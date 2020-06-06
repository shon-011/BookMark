<?php
session_start();
include("../funcs.php");
sic();

$bookName = $_POST["bookName"];
$imgURL = $_POST["bookURL"];
$ISBN = $_POST["ISBN"];
$comment = $_POST["comment"];
$unique_user_id =1;



//DB接続
$pdo = db_con();

  //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO book_mark(bookName,imgURL,unique_user_id,comment,indate,ISBN)VALUES(:bookName,:imgURL,:unique_user_id,:comment,sysdate(),:ISBN)");
$stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':imgURL', $imgURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':unique_user_id', $unique_user_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); 
$stmt->bindValue(':ISBN', $ISBN, PDO::PARAM_STR); 

$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    echo $error[2];
  }else{
    //５．index.phpへリダイレクト
    
    header("Location: select.php");
    exit();
  
  }
?>

//jsonで取得から