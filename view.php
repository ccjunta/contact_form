<?php
//目的：画面にお問合せ一覧を表示する
//[プロセス]
//1.必要な部品を読み込む(fuctions.php,dbconnect.php)
//2.画面に出力するものを取得する(SELECT)
//3.取得したデータを画面に表示

//1
require_once('function.php');
require_once('dbconnect.php');

//2 SELET文準備
$stmt = $dbh->prepare('SELECT * FROM surveys');
//2-1 準備したものを実行
$stmt->execute();

//取得した一覧を変数に格納
$results = $stmt->fetchAll();

//var_dump($results);



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>お問合せ一覧</title>
</head>
<body>
    <h1>一覧</h1>
    
    <!--一覧を表示する-->
    <?php foreach($results as $result){ ?>
    
    <p>名前：<?php echo h($result['username']); ?></p>  <!--この'username'はSQL上のカラム名-->
    <p>メールアドレス：<?php echo h($result['email']); ?></p>
    <p>内容：<?php echo h($result['content']); ?></p>
    
    <hr>

    <?php }?>
    
    
</body>
</html>