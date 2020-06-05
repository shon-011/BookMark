<?php
$bookName = $_POST["bookName"];
$imgURL = $_POST["bookURL"];
$ISBN = $_POST["ISBN"];
$comment = $_POST["comment"];
$userid =1;



//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_book02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //３．データ登録SQL作成
$stmt = $pdo->prepare("INSERT INTO book_mark(bookName,imgURL,userid,comment,indate,ISBN)VALUES(:bookName,:imgURL,:userid,:comment,sysdate(),:ISBN)");
$stmt->bindValue(':bookName', $bookName, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':imgURL', $imgURL, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':userid', $userid, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
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