<!DOCTYPE html>
<html lang="ja">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="css/syle.css">
    <title>BOOKMARK_SERCH</title>
  </head>
  <body>
    <label><input type="text" id="book" 　value="本を検索" /></label>
    <input type="submit" id="serch" value="検索" />

    <form action="insert.php" method="POST"><table id="card1"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card2"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card3"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card4"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card5"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card6"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card7"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card8"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card9"></table><input type="submit" value="追加"></form>
    <form action="insert.php" method="POST"><table id="card10"></table><input type="submit" value="追加"></form>
 
    
    


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="js/serch.js"></script>

    <script>

$("#serch").on("click", function () {
    let book = $("#book").val();
    console.log(book);
  

  $.getJSON(`https://www.googleapis.com/books/v1/volumes?q=${book}`, 
  function (data) {
    console.dir(data);

    let view="";
    for(let i=0; i<data.items.length; i++){
        let item = data.items[i];

        let bookName = item.volumeInfo.title;
        let bookURL = item.volumeInfo.imageLinks.thumbnail;
        let ISBN1310 = item.id;
        
        console.log(ISBN1310);
        
        
     
        view = `<ul>
                <img src="${bookURL}" >
                <li>${bookName}</li>　
                </ul>
                <div class="content">
                      <label>タイトル：<input type="text" name="bookName" value="${bookName}"></label><br>
                      <label>URL：<input type="text" name="bookURL" value="${bookURL}"　></label><br>
                      <label>本情報：<input 　type="text" name="ISBN" value="${ISBN1310}"　></label><br>
                      <label>コメント：<input type="text" name="comment" row="4"　cols="20"></label>
                  <br>
                `;
                        
        $(`#card${i}`).html(view);
        
     
    
                
            

    

    }
  });
});
    </script>
  </body>
</html>
