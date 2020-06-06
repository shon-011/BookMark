<?php

//ログイン認証
  function sic (){
      if(!isset($_SESSION["ssid"]) || $_SESSION["ssid"] != session_id()){
          echo "SIGN IN ERORR!";
          exit();
        };
  };


//DB接続
  function db_con(){
  try {
    $pdo = new PDO('mysql:dbname=gs_book02;charset=utf8;host=localhost','root','root');
    // $pdo = new PDO('mysql:dbname=gs_db;charset=utf8;host=データベースサーバーアドレス', 'さくらユーザー名', '接続パスワード' );
  } catch (PDOException $e) {
    exit('DBConnectError:'.$e->getMessage());
  }
    return $pdo;
  }
?>