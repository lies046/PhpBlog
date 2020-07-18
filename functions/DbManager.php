<?php

  function Db()
  {
    try{
    $dns = 'mysql:host=localhost;dbname=blog;charset=utf8';
    $user = 'root';
    $pass = '';
  
    $db = new PDO($dns, $user, $pass);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $db;
  }catch(PDOException $e){
      print $e;
    }
  }
  