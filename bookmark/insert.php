<?php
session_start();
include("../funcs.php");
sic();

$bookName = $_POST["bookName"];
$imgURL = $_POST["bookURL"];
$ISBN = $_POST["ISBN"];
$comment = $_POST["comment"];
$unique_user_id =$_SESSION["unique_user_id"];



//DB接続
$pdo = db_con();

  //３．データ登録SQL作成(book_mark)
$stmt = $pdo->prepare("INSERT INTO book_mark(ISBN,unique_user_id,comment,indate)VALUES(:ISBN,:unique_user_id,:comment,sysdate())");
$stmt->bindValue(':ISBN', $ISBN, PDO::PARAM_STR); 
$stmt->bindValue(':unique_user_id', $unique_user_id, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $comment, PDO::PARAM_STR); 
$status = $stmt->execute();



//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    echo $error[2];
  }else{

    //３．データ登録SQL作成(book_number)
    $stmt2 = $pdo->prepare("INSERT INTO book_number(ISBN,bookName,imgURL)VALUES(:ISBN,:bookName,:imgURL)");
    $stmt2->bindValue(':ISBN', $ISBN, PDO::PARAM_STR);
    $stmt2->bindValue(':bookName', $bookName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
    $stmt2->bindValue(':imgURL', $imgURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT) 
    $status2 = $stmt2->execute();

    //４．データ登録処理後(book_number)
    if($status2==false){
      //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
      $error = $stmt2->errorInfo();
      exit("SQLError:".$error[2]);
      echo $error[2];
    }else{
      header("Location: select.php");
      exit();
    }
      
  }


?>

