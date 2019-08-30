<?php

//このページが表示された時の送信方法を確認。(get or post)
//get送信の場合は、入力画面に遷移する
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	//このページを表示する際の送信がGETだった場合
	//index.htmlに遷移する
	header('Location: index.html');
}

//1. funcitons.phpを読み込む
//2.$postから送信された値を読み込む
//(エスケープ処理も)
//3.値を画面に表示する。
require_once('function.php');
//dbconnect.phpを接続
require_once('dbconnect.php');
//require_once('check.php');

$username =  h($_POST['username']); //これだとh1とかのタグがついてしまう
$email = h($_POST['email']);
$content = h($_POST['content']);

//受け取った値をもとにデータベースに接続　prepareをもとに準備 
//データベースを守るためSQLインジェクション　//クロスサイトほにゃららら
//SQLの準備
$stmt = $dbh->prepare('INSERT INTO surveys (username, email, content, created_at) VALUES(?,?,?, now())');

//SQL実行
//?に当たる部分を配列で渡す　？の場所　実行の場合は配列の値が埋め込まれる
$stmt->execute([$username,$email,$content]);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>送信完了</title>
</head>
<body>
	
  <h1>お問い合わせありがとうございました</h1>
  <p>名前：<?php echo $username;  ?></p>
  <p>メールアドレス：<?php echo $email;  ?></p>
  <p>お問い合わせ内容：<?php echo $content;  ?></p>

</body>
</html>