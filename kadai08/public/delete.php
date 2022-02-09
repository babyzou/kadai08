<?php
session_start();
require_once '../classes/UserLogic.php';
require_once '../functions.php';
require_once '../dbconnect.php';

$pdo = connect();
//1.対象のIDを取得
$id   = $_POST['id'];
$email   = $_SESSION['email'];
//3.削除SQLを作成
$stmt = $pdo->prepare('DELETE FROM users WHERE email = :email');//WHEREは特定するために使用（削除と更新で使用）
$stmt->bindValue(':email', $email, PDO::PARAM_STR);
$status = $stmt->execute(); //実行


//４．データ登録処理後
if ($status === false) {
    sql_error($stmt);
} else {
    header('Location: login.php');
    exit();
}