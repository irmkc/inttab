<?php
try {
    $vt = new PDO("mysql:dbname=afiyetolsun;host=localhost;charset=utf8","root", "");
    $vt->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  } catch (PDOException $e) {
    echo $e->getMessage();
  }
?>