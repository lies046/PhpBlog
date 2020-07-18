<?php
  session_start();
  //DBに接続
  require_once 'functions/DbManager.php';
  require_once 'functions/Security.php';
  $s = new Security();
  $id = $s->f($_GET['id']);
  $title = $s->f($_POST['title']);
  $category = $s->f($_POST['category']);
  $message = $s->f($_POST['message']);

  $db = Db();
  $stt = $db->prepare('UPDATE post SET title=:title, category=:category, post=:message WHERE id=:id');
  $stt->bindvalue(':id', $id);
  $stt->bindvalue(':title', $title);
  $stt->bindvalue(':category', $category);
  $stt->bindvalue(':message', $message);
  $stt->execute();

  $_SESSION['success'] = $id . '番の記事を更新しました。';
  header('Location: update.php');