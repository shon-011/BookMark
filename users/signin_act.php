<?php
session_start();
include("../funcs.php");

$userID = $_POST["userID"];
$password = $_POST["password"];




//DB接続
$pdo = db_con();

  //３．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_users WHERE userID=:userID AND password=:password");  
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
    $val = $stmt -> fetch();
    

    if( $val["unique_user_id"] != ""){
        
        $_SESSION["ssid"] = session_id();
        $_SESSION["userName"] = $val["userName"];

        
        header("Location: ../bookmark/select.php");
       

    }else{
        header("Location: sign.php");
    }
  
  }
?>