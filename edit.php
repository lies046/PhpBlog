<?php include_once 'header.php';
      include_once 'sidebar.php';

      //DBから記事一覧を取得　DBに接続して取得
      require_once 'functions/Dbmanager.php';
      require_once 'functions/Security.php';
      $s = new Security();
      $db = Db();
      $id = $s->f($_GET['id']);
      $stt = $db->prepare('SELECT * FROM post WHERE id=:id');
      $stt -> bindValue(':id', $id);
      $stt->execute();
      $row = $stt->fetch(PDO::FETCH_ASSOC);
?>

  <div id="main">
    <a href="delete.php?id=<?php echo $s->f($row['id']);?>"><button type="button" class="btn btn-danger">削除</button></a>
    <a href="update.php?id=<?php echo $s->f($row['id']);?>"><button type="button" class="btn btn-warning">編集</button></a>
    <br>
    件名:<?php echo $s->f($row['title']);?>
    <br>
    本文:<?php echo $s->f($row['post']);?>
  </div>

<?php include_once 'footer.php'; ?>
