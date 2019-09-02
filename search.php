<?php
// この画面で機能：名前が一致するデータの一覧表示
// [プロセス]
// 1. 必要なファイルの読み込み
// 2. 入力された名前でデータベース検索
// 3. 検索結果を画面に表示する


// 必要なファイルの読み込み
require_once('function.php');
require_once('dbconnect.php');

$username =''; //設定されていない、空文字で検索される
//名前が入力されているかチェック
if(isset($_GET['username'])){
// 送信された名前を取得
$username = $_GET['username'];
}


// 実行するSQLの準備
$stmt = 
$dbh->prepare('SELECT * FROM surveys WHERE username = ?');

// SQLの実行
$stmt->execute([$username]);

// 取得した一覧を変数に格納　fechAllは全体で取得
$results = $stmt->fetchAll();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>検索画面</title>
</head>
<body>
  <h1>検索画面</h1>
  <!-- actionが空の場合、自分に送信 -->
  <form action="" method="GET">
    <p>検索したい名前を入れてください</p>
    <input type="text" name="username">
    <input type="submit" value="検索">
  </form>

  <h2>検索結果</h2>

  <?php foreach($results as $result) { ?>
    <p>名前：<?php echo h($result['username']); ?></p>
    <p>メールアドレス：<?php echo h($result['email']); ?></p>
    <p>内容：<?php echo h($result['content']); ?></p>
    <hr>
  <?php } ?>

</body>
</html>