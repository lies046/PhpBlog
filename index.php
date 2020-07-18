<?php session_start(); ?>
<!DOCTYPE html>
  <html lang="ja">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/style.css">
  </head>
  <body>
    <div id="sidebar">
      <ul>
        <li><a href="#">記事投稿</a></li>
        <li><a href="#">記事一覧</a></li>
        <li><a href="#">カテゴリー管理</a></li>
        <li><a href="#">記事管理</a></li>
        <li><a href="#">その他</a></li>
      </ul>
    </div>

    <div id="main">
      <?php if(!empty($_SESSION['success'])) :?>
        <div class="alert alert-success" role="alert">
          <?php echo $_SESSION['success']; ?>
        </div>
      <?php endif ; ?>
      <form method="POST" action="post.php">
        <div class="form-group">
          <label for="exampleFormControlInput1">タイトル</label>
          <input type="text" class="form-control" id="exampleFormControlInput1" name="title">
        </div>
        <div class="form-group">
          <label for="exampleFormControlSelect1">カテゴリー</label>
          <select class="form-control" id="exampleFormControlSelect1" name="category">
            <option>1</option>
            <option>2</option>
            <option>3</option>
            <option>4</option>
            <option>5</option>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleFormControlTextarea1">本文</label>
          <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="message"></textarea>
        </div>
        <button type="submit" class="btn btn-primary btn-lg btn-block">投稿する</button>
      </form>
    </div>
    <div class="clear">
    </div>
  </body>
</html>