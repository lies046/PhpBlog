<?php
  session_start();

  require_once 'functions/DbManager.php';
  require_once 'functions/Security.php';
  //データを変数に代入
  //サニタイズ処理
  $s = new Security();
  $title = $s->f($_POST['title']);
  $category = $s->f($_POST['category']);
  $message = $s->f($_POST['message']);

  //DBに保存　DBに接続して、データを挿入 
  $db = Db();
  $stt = $db->prepare('INSERT INTO post(title, category, post) VALUES(:title, :category, :message)');
  $stt->bindValue(':title', $title);
  $stt->bindValue(':category', $category);
  $stt->bindValue(':message', $message);
  $stt->execute();

  $_SESSION['success'] = "記事の投稿が完了しました。";
  header('Location: index.php');
