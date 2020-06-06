<?php
session_start();
include("../funcs.php");


$userName = $_POST["userName"];
$userID = $_POST["userID"];
$password = $_POST["password"];




//DB接続
$pdo = db_con();

  //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO book_users(userName,userID,password,act)VALUES(:userName,:userID,:password,:act)");
$stmt->bindValue(':userName', $userName, PDO::PARAM_STR);  
$stmt->bindValue(':userID', $userID, PDO::PARAM_STR);  
$stmt->bindValue(':password', $password, PDO::PARAM_STR);  


$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
    echo $error[2];
  }else{
    //５．リダイレクト
    $_SESSION["ssid"] = session_id();
    header("Location: select.php");
    exit();
  
  }
?>

//jsonで取得から