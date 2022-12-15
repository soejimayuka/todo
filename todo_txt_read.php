

<?php
$str = '';
$array =[];

// ファイルを開く（読み取り専用）
$file = fopen('data/todo.txt', 'r');
// ファイルをロック
flock($file, LOCK_EX);

// fgets()で1行ずつ取得→$lineに格納
if ($file) {
  while ($line = fgets($file)) {
    // 取得したデータを`$str`に追加する
    $str .="<tr><td>{$line}</td></tr>";
    $array[] = [
      "title" => explode(" ", $line)[0],
       "description" => str_replace("\n","",explode(" ", $line)[1]),
       "priorityselect" => str_replace("\n","",explode(" ", $line)[2]),
       "timeselect" => str_replace("\n","",explode(" ", $line)[3]),
       "limitselect" => str_replace("\n","",explode(" ", $line)[4]),
    ];
  }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/common.css" />
  <title>todo list</title>

   <script src="https://unpkg.com/vue@next"></script>
</head>

<body>


    <div class="l-section">
  <div class="d-container">

    <div id="app">
      <h1 class="c-heading">TODO</h1>
        <dl class=l-todos>
          <div class=l-todos__container>
            <dt class="l-todos__left"><label for="hideDone">完了を非表示</label></dt>
            <dd >
            <input type="checkbox" id="hideDone" v-model="hideDone" />
          </dd>

          </div>

          <div class=l-todos__container>
          <dt class="l-todos__left"><label for="filter">カテゴリーで絞る</label></dt>
          <dd>
            <select v-model="filter" id="filter">
              <option value="all">全て</option>
              <option v-for="priority, index in priorities" :key="index" :value="index">{{ priority }}</option>
            </select>
          </dd>
        </div>
        <div class=l-todos__container>
          <dt class="l-todos__left"><label for="sort">並び替え</label></dt>
          <dd>
            <select v-model="sort" id="sort">
              <option value="asc">昇順</option>
              <option value="desc">降順</option>
            </select>
          </dd>
        </div>
          <div class=l-todos__container>
          <dt class="l-todos__left"><label for="search">キーワード検索</label></dt>
          <dd>
            <input type="search" id="search" v-model="search" />
          </dd>
        </div>
        </dl>

      <div class="todos">
        <ul class="l-list">
          <li v-for="todo in results" :key="todo.id">
            <input type="checkbox" v-model="todo.done" />
            {{todo.title}}:{{todo.description}}  {{priorities[todo.priorityselect]}}
        </ul>






  <ul>
    <li class="p-btn -secondary">
      <a href="todo_txt_input.php" class="p-btn__button">TODO INPUT FORM</a>
    </li>
    <li class="p-btn -secondary">
      <a href="logout.php" class="p-btn__button">LOGOUT</a>
    </li>
  </ul>
      </div>
    </div></div></div>

  <script>




Vue.createApp({
  data() {
    return {
      title: "",
      description: "",
      todos: [],
      sort: "desc",
      priorities: ["カテゴリー1", "カテゴリー2", "カテゴリー3"],
      priority: "",
      filter: "all",
      done: false,
      hideDone: false,
      search: "",
    };
  },

  computed: {
    results() {
      return this.todos
        .filter((todo) => {
          if (this.filter === "all") {
            return true;
          } else {
            return this.filter == todo.priorityselect;
          }
        })

        .filter((todo) => {
          if (!this.hideDone || !todo.done) {
            return true;
          }
        })

        .filter((todo) => {
          return todo.title.includes(this.search) || todo.description.includes(this.search);
        })

        .sort((a, b) => {
          const dataA = new Date(a.timeselect);
          const dataB = new Date(b.timeselect);
          if (this.sort === "asc") {
            return dataA - dataB;
          }
          return dataB - dataA;
        });
    },

  },

  created() {
    var tod = <?=json_encode($array) ?>;
    console.log(tod);
    const todos = tod;
    if (todos) {
      this.todos = todos;
    }
  },
}).mount("#app");

  </script>

</body>

</html>
