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
    $comment = $res["comment"];
    
    //２．データ登録SQL作成(book_number)
  $stmt2 = $pdo->prepare("SELECT * FROM book_number WHERE ISBN = :ISBN ");
  $stmt2->bindValue(':ISBN',$ISBN,PDO::PARAM_STR);

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

        <div class=""row>
          <div class="col s4">
              <div class="card-panel hoverable "> 
                <div class="card">
                  <span class="">{$bookName}</span>
                        <div class="card-image">
                        <img src="{$imgURL}" class="imgURL">
                        </div>
                        <div class="card-content">
                            <p>{$comment}</p>
                        </div>
                        <a href="u_view.php?id={$res['id']}">[編集]</a>
                        <a href="delete.php?id={$res['id']}&ISBN={$ISBN}">[削除]</a>
                    </div>
                  </div>
                </div>
                </div>
            


    EOT;

    }

   
    
    
  }
}

$ranking ="";

//4.ランキングセット
$rank = $pdo->prepare("SELECT ISBN, COUNT(*) AS COUNT FROM book_mark GROUP BY ISBN ORDER BY COUNT DESC LIMIT 5;");
$sta = $rank->execute();

//5.ランク表示
$num = 0;
$rankview="";
if($sta==false){
  $error = $ran->errorInfo();
  exit("SQLError:".$error[2]);
}else{
  while( $res2 = $rank->fetch(PDO::FETCH_ASSOC)){ 
  $RANK = $res2["ISBN"];


  //5．データ登録SQL作成(book_number)
  $stmt5 = $pdo->prepare("SELECT * FROM book_number WHERE ISBN = :ISBN ");
  $stmt5->bindValue(':ISBN',$RANK,PDO::PARAM_STR);
  $status5 = $stmt5->execute();

  if($status5==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt2->errorInfo();
    exit("SQLError:".$error[2]);
  }else{  
    $bookInfo = $stmt5->fetch();
    $bookName= $bookInfo["bookName"];
    $imgURL= $bookInfo["imgURL"];
    
    $num++;
    
    $ranking .= <<< EOT
      <div class="col s2">
      <p>{$num}位！<br>
      <img src="{$imgURL}">
      </br>
      </div>
      EOT;

    }
  
  
  

}
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Google icon font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/syle.css">
    <title>HOME</title>
</head>
<body>
<!-- Page Layout here -->
<nav class="teal lighten-3 z-depth-4">
<h4>ブックマーク課題</h4>
</nav>

<div class="row ">
  <div class="col s2　grey">
 
 <div class="wrapper ">
      <ul>
        <li><a href="#">HOME</a></li>
        <li><a href="serch.php">本　検索</a></li>
        <li><a href="select.php/#rank">ランキング</a></li>
        <li><a href="#">ユーザー設定</a></li><br>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </div>

  <div class="col s10 z-depth-1">
  <h4><?=$userName?>さんのブックマーク一覧</h4>
    <div class="row" >
    <?=$view?>
    </div>
    
  <div>
  
  </div>
    
  
    
    <div id="rank" class="row">
      <h4>ブックマーランキング</h4>
      <div id="ranking">
        <?=$ranking?>
      </div>
    </div>

  </div>
</div>




  

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>



