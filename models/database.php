<?php

function getPDO() {
  $config = require 'config/database.php';

  return new PDO(
    "mysql:host={$config['host']};dbname={$config['dbname']};charset=utf8",
    $config['user'],
    $config['password'],
    [
      PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
    ]
  );
}
