<!DOCTYPE html>
<html lang="ja">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
  <meta name="description" content="このページの説明文">
  <title>牡蠣のレビューページ</title>
  <link rel="stylesheet" href="">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
</head>
<body> 

<?php
   include 'db_config.php';
  try {
    
    $db = new PDO(PDO_DSN, DB_USERNAME, DB_PASSWORD);
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //DB名、ユーザー名、パスワード
    // $dsn = 'mysql:dbname=review_db;host=';
    // $user = '';
    // $password = '';

    // $PDO = new PDO($dsn, $user, $password); //MySQLのデータベースに接続
    // $PDO->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); //PDOのエラーレポートを表示

    //input_post.phpの値を取得
    $name = $_POST['name'];  
    $comment = $_POST['comment'];
    // $comment = 'text';
    
    $sql = "INSERT INTO `comment_ven`(`name`,`comment`) VALUES (:name,:kansou)";
    // $sql = "INSERT INTO comment_ven(name,comment) VALUES (:name,:kansou)"; // INSERT文を変数に格納。:nameや:categoryはプレースホルダという、値を入れるための単なる空箱
    $stmt = $db->prepare($sql); //挿入する値は空のまま、SQL実行の準備をする
    $params = array(':name' => $name,':kansou' => $comment); // 挿入する値を配列に格納する
    $stmt->execute($params); //挿入する値が入った変数をexecuteにセットしてSQLを実行

    echo '<p>で登録しました。</p>'; // 登録完了のメッセージ
  } catch (PDOException $e) {
  exit('データベースに接続できませんでした。' . $e->getMessage());
  }
?>

</body>
</html>