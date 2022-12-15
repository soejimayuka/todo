<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="css/common.css" />
  <title>login</title>
</head>
<body>
  <div class="l-section">
  <div class="d-container">
    <h1 class="c-heading">TODO LIST LOGIN</h1>
      <form action="receive.php" method="post" class="p-inputForm">
        <dl class="l-form">
          <dt><label for="name">ユーザー名</label></dt>
          <dd>
            <input type="text" name="name" id="name" class="p-input" >
          </dd>
          <dt><label for="password">パスワード</label></dt>
          <dd>
            <input type="password" name="password" id="password" class="p-input">
          </dd>
        </dl>
        <p class="p-btn"><input type="submit" value="LOGOIN" class="p-btn__button"></p>
      </form>
  </div></div>
</body>
</html>
