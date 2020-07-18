<?php
  session_start();
  //データを変数に代入
  //サニタイズ処理
  $title = htmlspecialchars($_POST['title'], ENT_QUOTES, 'utf-8');
  $category = htmlspecialchars($_POST['category'], ENT_QUOTES, 'utf-8');
  $message = htmlspecialchars($_POST['message'], ENT_QUOTES, 'utf-8');

  //DBに保存　DBに接続して、データを挿入
  try{
  $dns = 'mysql:host=localhost;dbname=blog;charset=utf8';
  $user = 'root';
  $pass = '';

  $db = new PDO($dns, $user, $pass);
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  }catch(PDOException $e){
    print $e;
  }

  $stt = $db->prepare('INSERT INTO post(title, category, post) VALUES(:title, :category, :message)');
  $stt->bindValue(':title', $title);
  $stt->bindValue(':category', $category);
  $stt->bindValue(':message', $message);
  $stt->execute();

  $_SESSION['success'] = "記事の投稿が完了しました。";
  header('Location: index.php');
