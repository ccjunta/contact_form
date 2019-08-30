<?php
//このページが表示された時の送信方法を確認。(get or post)
//get送信の場合は、入力画面に遷移する
if($_SERVER['REQUEST_METHOD'] == 'GET'){
	//このページを表示する際の送信がGETだった場合
	//index.htmlに遷移する
	header('Location: index.html');
}

//スーパーグローバル変数(phpがもともと用意している変数)
//var_dump($_POST); //$_POSTは連想配列　引き出しのキーをつける必要がある
//連想配列なので、中身であるkeyを取り出す必要がある。keyはname

//送信されてきた値の取得
//エスケープ処理をして、
//XSS(クロスサイトスクリプティング)の対策をする

//エスケープ処理：htmlspecialchars
// htmlspecialchars(対象の文字, オプション, 文字コード)

//function.phpを読み込んで、
//定義した関数を使え流ようにする
require_once('function.php');
//require()上は一回しか読み込まない、これは何回も読み込む

$username =  h($_POST['username']); //これだとh1とかのタグがついてしまう
$email = h($_POST['email']);
$content = h($_POST['content']);

//　ユーザー名が空かチェック
if ($username == '') {
	$usernameResult = 'ユーザー名が表示されていません。';
} else {
	$usernameResult = $username; //usernameを残しておきたい
}

if ($email == '') {
	$emailResult = 'メールアドレスが表示されていません。';
} else {
	$emailResult = $email;
}

if ($content == '') {
	$contentResult = 'コンテンツが表示されていません。';
} else {
	$contentResult = $content;
}

//XSSを防ぐ
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>入力内容確認</title>
</head>
<body>
	<h1>入力内容確認</h1>
	
	<p>名前:<?php echo $usernameResult;  ?></p>
	<p>メールアドレス:<?php echo $emailResult;  ?></p>
	<P>お問合せ:<?php echo $contentResult; ?></p>

	<form action="./thanks.php" method="POST">
	<input type="hidden" name="username" value="<?php echo $username;  ?>"> <!--type=hidden 隠れている点が違う-->
	<input type="hidden" name="email" value="<?php echo $email;  ?>">
	<input type="hidden" name="content" value="<?php echo $content;  ?>">
		<button type="button" onclick="history.back();">戻る</button>
		<input  type="submit" value="OK">
	</form>
</body>
</html>