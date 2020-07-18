<?php

//セキュリティ対策
class Security
{
  public function f($value)
  {
    return htmlspecialchars($value, ENT_QUOTES, 'utf-8');
  }
}

?>