<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';
require_once '../dbconnect.php';
// $content=$_SESSION['content'];

$pdo = connect();

$id = $_POST["id"];
// var_dump($id);
var_dump($_POST);

//２．データ登録SQL作成
$stmt = $pdo->prepare('SELECT * FROM users');
$status = $stmt->execute();

//３．データ表示
$view = '';
if ($status === false) {
    $error = $stmt->errorInfo();
    exit('SQLError:' . print_r($error, true));
} else {
    $result = $stmt->fetch(PDO::FETCH_ASSOC);
        //GETデータ送信リンク作成
        // <a>で囲う。
        $view .= '<p>';
        $view .='<a href="detail.php?id='.$result["email"].'">';
        $view .=$result['content'];
        $view .='</a>';
        $view .= '<a href="delete.php?id=' . $result['id'] . '">';//追記
        $view .= '  [削除]';//追記
        $view .= '</a>';//追記
        $view .= '</p>';
    
}

//ログインしているか判定し、していなかったら新規登録画面へ返す
$result = UserLogic::checkLogin();

if (!$result) {
  $_SESSION['login_err'] = 'ユーザを登録してログインしてください！';
  header('Location: signup_form.php');
  return;
}

$login_user = $_SESSION['login_user'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>マイページ</title>
</head>
<body>
<h2>マイページ</h2>
<p>ログインユーザ：<?php echo h($login_user['name']) ?></p>
<p>メールアドレス：<?php echo h($login_user['email']) ?></p>
<p>メモ：<?php echo h($login_user['content']) ?></p>
<input type='hidden' name="id" value=$result['id']>

<form action="logout.php" method="POST">
<input type="submit" name="logout" value="ログアウト">
<input type='hidden' name="id" value=$result['id']>
</form>

<form action="update.php" method="POST">
<input type="submit" name="logout" value="更新">
<input type='hidden' name="id" value=$result['id']>
</form>

<form action="delete.php" method="POST">
<input type="submit" name="logout" value="メモの削除">
<input type='hidden' name="id" value=$result['id']>
</form>
<!-- ①ログアウト画面の作成 -->
<!-- ②ログアウトメソッドの作成 -->
</body>
</html>