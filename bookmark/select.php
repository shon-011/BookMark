<?php 
//DB接続
try {
    //Password:MAMP='root',XAMPP=''
    $pdo = new PDO('mysql:dbname=gs_book02;charset=utf8;host=localhost','root','root');
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }

  //２．データ登録SQL作成
$stmt = $pdo->prepare("SELECT * FROM book_mark WHERE userid ='1' ORDER BY id DESC");
$status = $stmt->execute();

//３．データ表示
$view="";
if($status==false) {
    //execute（SQL実行時にエラーがある場合）
  $error = $stmt->errorInfo();
  exit("SQLError:".$error[2]);

}else{
  //Selectデータの数だけ自動でループしてくれる
  //FETCH_ASSOC=http://php.net/manual/ja/pdostatement.fetch.php
  while( $res = $stmt->fetch(PDO::FETCH_ASSOC)){ 
   
    $view .= <<< EOT
    <p>
      {$res["id"]}{$res["bookName"]}<br>
      <a href="u_view.php?id={$res['id']}">
        <img src="{$res['imgURL']}">
      </a>
      <a href="delete.php?id={$res['id']}">[削除]</a>
    </p>
    EOT;
    
  }

}

?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク一覧</title>
</head>
<body>
  Guest　さんのブックマーク一覧
    <?=$view?>
</body>
</html>