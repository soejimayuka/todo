<?php
  // セッションの開始
  session_start();

  // ログインユーザーを変数で管理
  $name = 'soe'; // お好きなユーザー名に変更
  $password = 'jima'; // お好きなパスワードに変更

  // ログインに成功したらセッションに保存
  if ( $_POST['name'] == $name && $_POST['password'] == $password  ) {

    // セッションIDを生成
    session_regenerate_id(true);

    // セッションにユーザ名を格納
    $_SESSION['name'] = $_POST['name'];

    $msg = 'LOGIN IN SUCCESSFUL';

  } else {
    // ログイン失敗
    $msg = 'ログイン出来ませんでした。';
  }
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/common.css" />
  <title>receive</title>
</head>
<body>
    <div class="l-section">
  <div class="d-container">
  <p class="c-heading"><?php echo htmlspecialchars($msg, ENT_QUOTES, 'UTF-8'); ?></p>

  <ul>
    <li class="p-btn -secondary"><a href="./" class="p-btn__button">RETURN TO LOGIN FORM</a></li>
    <li class="p-btn -secondary"><a href="todo_txt_read.php" class="p-btn__button">MOVE TO TODO LIST</a></li>
  </ul>
</div></div>
</body>
</html>
