<?php 
session_start();

//session初期化
$_SESSION = array();

//Ciikie破棄
if(isset($_COOKIE[session_name()])){
    setcookie(session_name(),"",time()-42000,'/');
};

//sessionID破棄
session_destroy();

//リダイレクト
header("Location: ../users/signin.php");
exit();
?>

