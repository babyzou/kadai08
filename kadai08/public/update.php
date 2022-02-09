<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';
require_once '../dbconnect.php';

$pdo = connect();

$email  = $_SESSION['email'];

//1. POSTデータ取得
$name   = $_POST['name'];
$email  = $_POST['email'];
$password = $_POST['password'];
$content = $_POST['content'];
//これはなんですか？detail.phpのhiddenで送られたid
$id = $_POST["id"]; //これを追加しましょう🤗

//2. DB接続します
// function.phpに記述したものを書きますよ🤗↓
// これが一番最初に書く、呼び出したい時！🤗


//３．データ更新SQL作成
// $stmt = $pdo->prepare("INSERT INTO gs_an_table(name,email,age,content,indate)VALUES(:name,:email,:age,:content,sysdate())");
//$stmt = $pdo->prepare( 'UPDATE gs_an_table SET name = :name, email = :email, age = :age, content = :content, indate = sysdate() WHERE id = :id;' );


$stmt = $pdo->prepare("UPDATE users SET name=:name, email=:email, password=:password, content=:content, WHERE id = :id;");

// 数値の場合 PDO::PARAM_INT
// 文字の場合 PDO::PARAM_STR
$stmt->bindValue(':name', $name, PDO::PARAM_STR);
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$stmt->bindValue(':password', $password, PDO::PARAM_STR);
$stmt->bindValue(':content', $content, PDO::PARAM_STR);

// hiddenで受け取ったidをbindValueを用いて「安全かチェック」をする＝SQLインジェクション対策
$stmt->bindValue(':email', $email, PDO::PARAM_INT); //数値 なぜ？DBの設定でidを登録するときにINTにしているから🤗
$status = $stmt->execute(); //実行

//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    header('Location: mypage.php');
    exit();
}