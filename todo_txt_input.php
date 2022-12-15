<?php
date_default_timezone_set('Asia/Tokyo');
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/common.css" />
  <title>input</title>
</head>

<body>
    <div class="l-section">
  <div class="d-container">
        <h1 class="c-heading">TODO INPUT</h1>
  <form action="todo_txt_create.php" method="POST" class="p-inputForm">
  <dl class="l-form">
    <dt><label for="name" >TITLE</label></dt>
    <dd>
      <input type="text" name="title" class="p-input">
    </dd>
    <dt><label for="name" >DESCRIPTION</label></dt>
    <dd>
      <input type="text" name="description"  class="p-input">
    </dd>
    <dt><label for="name" >CATEGORY</label></dt>
    <dd>
      <select id="priority" name="priority" class="p-select__first">
        <option value="0">カテゴリー1</option>
        <option value="1">カテゴリー2</option>
        <option value="2">カテゴリー3</option>
      </select>
    </dd>
     <input type="hidden" name="time" value="<?php echo Date('Y/m/d/H:i:s'); ?>" size="60">
  </dl>

      <div class="p-btn -force">
        <button class="p-btn__submit">登録</button>
      </div>

  </form>
      <p class="p-btn -third"><a href="todo_txt_read.php" class="p-btn__button -third">TODO LIST</a></p>
 </div></div>
</body>

</html>
