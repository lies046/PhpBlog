<?php include_once 'header.php';
      include_once 'sidebar.php';

      //DBから記事一覧を取得　DBに接続して取得
      require_once 'functions/Dbmanager.php';
      require_once 'functions/Security.php';
      $s = new Security();
      $db = Db();
      $stt = $db->prepare('SELECT * FROM post');
      $stt->execute();
      $row = $stt->fetchAll();
      // var_dump($row);
?>

<div id="main">
  <table class="table">
    <thead>
      <tr>
        <th scope="col">#</th>
        <th scope="col">タイトル</th>
        <th scope="col">投稿日時</th>
      </tr>
    </thead>
    <?php foreach ($row as $value) : ?>
    <tbody>
    <tr>
      <th scope="row"><?php echo $s->f($value['id']); ?></th>
      <td>
        <a href="edit.php?id=<?php echo $s->f($value['id']) ?>">
          <?php echo $s->f($value['title']); ?>
        <a>
      </td>
      <td><?php echo $s->f($value['created_at']); ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

</div>

<?php include_once 'footer.php'; ?>