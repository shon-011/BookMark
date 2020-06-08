<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <!-- Google icon font -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../css/syle.css">
    <title>BOOKMARK_SERCH</title>
  </head>
  <body>


  <nav class="teal lighten-3 z-depth-4">
<h4>ブックマーク課題</h4>
</nav>

<div class="row ">
  <div class="col s2　grey">
 
 <div class="wrapper ">
      <ul>
        <li><a href="select.php">HOME</a></li>
        <li><a href="serch.php">本　検索</a></li>
        <li><a href="">ユーザー設定</a></li><br>
        <li><a href="logout.php">ログアウト</a></li>
      </ul>
    </div>
  </div>

  <div class="col s10 ">
  <label><h3>本を検索</h3><input type="text" id="book" 　value="本を検索"  /><input type="submit" id="serch" value="検索"  class="btn"/></label>
    

    <form id="f" action="insert.php" method="POST"><table id="card1"></table><input class="add" type="submit" value="追加"　class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card2"></table><input class="add" type="submit" value="追加"　class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card3"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card4"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card5"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card6"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card7"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card8"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card9"></table><input class="add" type="submit" value="追加" class="btn"></form>
    <form id="f" action="insert.php" method="POST"><table id="card10"></table><input class="add" type="submit" value="追加" class="btn"></form>
 
    </div>
    




    

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>

$("#serch").on("click", function () {
    let book = $("#book").val();
    
    $(".add").show();
  

  $.getJSON(`https://www.googleapis.com/books/v1/volumes?q=${book}`, 
  function (data) {
    console.dir(data);

    let view="";
    for(let i=0; i<data.items.length; i++){
        let item = data.items[i];

        let bookName = item.volumeInfo.title;
        let bookURL = item.volumeInfo.imageLinks.thumbnail;
        let ISBN1310 = item.id;
          
        view = `<ul>
              <h5>${bookName}</h5>
                <img src="${bookURL}" >
                <label><input type="hidden" name="ISBN" value="${ISBN1310}"　></label><br>
                  <label><h4>コメント：</h4><input type="text" name="comment" s5></label>
                  <label><input type="hidden" name="bookName" value="${bookName}"></label><br>
                  <label><input type="hidden" name="bookURL" value="${bookURL}"　></label><br>
                  <br>
                </ul>
                  
                `;
                        
        $(`#card${i}`).html(view);
        
     
    
                
            

    

    }
  });
});
    </script>
<!-- Compiled and minified JavaScript -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
  </body>
</html>
