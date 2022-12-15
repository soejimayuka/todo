<?php
// POSTの場合も必ず最初にチェック！！
// var_dump($_POST);
// exit();

// データの受け取り
$title = $_POST["title"];
$description = $_POST["description"];

if(isset($_POST["priority"])) {
  // セレクトボックスで選択された値を受け取る
  $priorityselect = $_POST["priority"];
}
if(isset($_POST["time"])) {
  // セレクトボックスで選択された値を受け取る
  $timeselect = $_POST["time"];
}





// データ1件を1行にまとめる（最後に改行を入れる）
$write_data = "{$title} {$description} {$priorityselect} {$timeselect}\n";

// ファイルを開く．引数が`a`である部分に注目！
$file = fopen('data/todo.txt', 'a');

// ファイルをロックする
flock($file, LOCK_EX);

// 指定したファイルに指定したデータを書き込む
fwrite($file, $write_data);

// ファイルのロックを解除する
flock($file, LOCK_UN);

// ファイルを閉じる
fclose($file);

// データ入力画面に移動する
header("Location:todo_txt_input.php");
