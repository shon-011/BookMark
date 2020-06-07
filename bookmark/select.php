<?php 
session_start();
include("../funcs.php");
sic();
$unique_user_id = $_SESSION["unique_user_id"];
$userName =  $_SESSION["userName"];

//DB接続
$pdo = db_con();

  //２．データ登録SQL作成(book_mark)
$stmt = $pdo->prepare("SELECT * FROM book_mark WHERE unique_user_id = $unique_user_id ORDER BY id DESC");
$status = $stmt->execute();



//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{

  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){ 
    $ISBN = $res["ISBN"];
    
    //２．データ登録SQL作成(book_number)
  $stmt2 = $pdo->prepare("SELECT * FROM book_number WHERE ISBN = '{$ISBN}' ");
    $status2 = $stmt2->execute();
    
   

    //３．データ表示(book_numer)
   
    if($status2==false) {
        //execute（SQL実行時にエラーがある場合）
      $error = $stmt2->errorInfo();
      exit("SQLError:".$error[2]);
    }else{  
      $bookInfo = $stmt2->fetch();
      $bookName= $bookInfo["bookName"];
      $imgURL= $bookInfo["imgURL"];
      
      $view .= <<< EOT
    <p>
      {$res["id"]}{$bookName}<br>
      <a href="u_view.php?id={$res['id']}">
        <img src="{$imgURL}">
      </a>
      <a href="delete.php?id={$res['id']}">[削除]</a>
    </p>
    EOT;

    }

   
    
    
  }
}

//DB接続2
// $pdo = db_con();
//4.ランキングセット
// $rank = $pdo->prepare("SELECT ISBN, COUNT(*) FROM book_mark GROUP BY ISBN;");
// $sta = $rank->query();

//5.ランク表示
// $rankview="";
// if($sta==false){
//   $error = $ran->errorInfo();
//   exit("SQLError:".$error[2]);
// }else{
//   $res2 = $rank->fetch();
//   var_dump($res2);

// }

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク一覧</title>
</head>
<body>
  
  <?=$userName?> さんのブックマーク一覧
  <a href="serch.php">本を検索</a>
  <a href="logout.php">SIGN OUT</a>
    <?=$view?>

    <div>
      <h3>ブックマーランキング</h3>
      <div id="ranking"></div>
    </div>
</body>
</html>