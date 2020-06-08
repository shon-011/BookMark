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
    <title>BOOKMARK_SIGNUP</title>
</head>
<body class="signin_body">
    <form action="insert_user.php" method="POST">
        <div class="head">
            <h2>ブックマーク課題<br>　SIGN UP</h2>
        </div>
        <div class="form_body">
            <label>UserName:<input type="text" name="userName"></label><br>
            <label>UserID:<input type="text" name="userID"></label><br>
            <label>Password:<input type="password" name="password" ></label><br>
            <input type="submit" value="SIGN UP" class="btn orange darken-4">
            
        </div>
    </form>
    

<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>