<?php
$name = $_POST["name"];
$url = $_POST["url"];
$com = $_POST["com"];

//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_book;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO gs_bm_table(bookName,url,comment,indate)VALUES(:bookName,:url,:comment,sysdate())");
$stmt->bindValue(':bookName', $name, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':url', $url, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':comment', $com, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//４．データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("SQLError:".$error[2]);
  }else{
    //５．index.phpへリダイレクト
    header("Location: select.php");
    exit();
  
  }
?>

//jsonで取得から