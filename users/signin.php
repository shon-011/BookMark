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
    <title>BOOKMARK_SIGNIN</title>
</head>
<body class="signin_body">
    <form action="signin_act.php" method="POST">
        <div class="head">
            <h2>ブックマーク<br>　SIGN IN</h2>
        </div>
        <div class="form_body">
            <label>UserID:<input type="text" name="userID" class="validate"></label><br>
            <label>Password:<input type="password" name="password" class="validate"></label><br>
            <input class="btn light-blue darken-3" type="submit" value="SIGN IN"　>
            <a href="signup.php" class="btn orange darken-4">SIGN UP</a>
        </div>
    </form>
   
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
            
</body>
</html>