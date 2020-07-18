<?php include_once 'header.php';
      include_once 'sidebar.php';
?>

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
<?php include_once 'footer.php'; ?>
