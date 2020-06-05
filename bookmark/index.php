<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ブックマーク登録</title>
</head>
<body>
    <h1>ブックマーク登録</h1>

    <form action="insert.php" method="post">
    <label>本の名前：<input type="text" name="name"></label>
    <label>URL：<input type="text" name="url"></label>
    <label>コメント：<input type="text" name="com" rows="4" cols="40"></label>
    <input type="submit" value="送信">
    </form>




</body>
</html>