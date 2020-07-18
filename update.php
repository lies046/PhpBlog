<?php
  if(!empty($_SESSION['success'])){
    unset($_SESSION['success']);
  }
include_once 'header.php';
include_once 'sidebar.php';

  //DBに接続
  require_once 'functions/DbManager.php';
  require_once 'functions/Security.php';
  $s = new Security();
  $id = $s->f($_GET['id']);

  $db = Db();
  $stt = $db->prepare('SELECT * FROM post WHERE id=:id');
  $stt->bindvalue(':id', $id);
  $stt->execute();
  $row = $stt->fetch(PDO::FETCH_ASSOC);
?>

<div id="main">
  <?php if(!empty($_SESSION['success'])) :?>
      <div class="alert alert-success" role="alert">
        <?php echo $_SESSION['success']; ?>
      </div>
    <?php endif ; ?>
    <form method="POST" action="update_blog.php">
      <div class="form-group">
        <label for="exampleFormControlInput1">タイトル</label>
        <input type="text" class="form-control" id="exampleFormControlInput1" name="title" value="<?php echo $s->f($row['title']); ?>">
      </div>
      <div class="form-group">
        <label for="exampleFormControlSelect1">カテゴリー</label>
        <select class="form-control" id="exampleFormControlSelect1" name="category">
          <option selected=""><?php echo $s->f($row['category']);?></option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleFormControlTextarea1">本文</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="13" name="message">
          <?php echo $s->f($row['post']); ?>
        </textarea>
      </div>
      <button type="submit" class="btn btn-primary btn-lg btn-block">投稿する</button>
    </form>
</div>

<?php include_once 'footer.php'; ?>