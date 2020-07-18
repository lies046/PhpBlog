<?php
session_start();
  //DBに接続
  require_once 'functions/DbManager.php';
  require_once 'functions/Security.php';
  $s = new Security();
  $id = $s->f($_GET['id']);

  $db = Db();
  $stt = $db->prepare('DELETE FROM post WHERE id=:id');
  $stt->bindvalue(':id', $id);
  $stt->execute();

  $_SESSION['success'] = $id . '番の記事を削除しました。';
  header('Location: index.php');