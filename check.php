<?php
//スーパーグローバル変数(phpがもともと用意している変数)

var_dump($_POST); //$_POSTは連想配列　引き出しのキーをつける必要がある
//連想配列なので、中身であるkeyを取り出す必要がある。keyはname

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
	
	<p>名前:<?php echo $_POST['username'];  ?></p>
	<p>メールアドレス:<?php echo $_POST['email'];  ?></p>
	<P>お問合せ:<?php echo $_POST['content']; ?></p>

	<form action="">
		<button>戻る</button>
		<input type="submit" value="OK">
	</form>
</body>
</html>