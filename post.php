<?php

  //データを変数に代入
  $title = $_POST['title'];
  $category = $_POST['category'];
  $message = $_POST['message'];

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

  $stt = $db->prepare('INSERT INTO post(title, category, post) VALUE(:title, :category, :message)');
  $stt->bindValue(':title', $title);
  $stt->bindValue(':category', $category);
  $stt->bindValue(':message', $message);
  $stt->execute();
