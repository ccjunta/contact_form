<?php
// データベースに接続する処理

// 接続に使用する値を変数に格納
$host = "localhost";
$dbname = "contact_form";
$charset = "utf8";
$user = "root";
$password = "";
$options = [
  PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
  PDO::ATTR_EMULATE_PREPARES   => false,
];

$dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";


// データベースへの接続
try {
  // データベースへの接続実行
  $dbh = 
    new PDO($dsn, $user,$password, $options);
} catch (\PDOException $e) {
  // データベースへの接続に失敗した場合
  // エラーを出力
  var_dump($e->getMessage());

  // 処理を強制的に中断
  exit;
}