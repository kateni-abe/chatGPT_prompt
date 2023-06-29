<?php
//----------------------------------------
// ▼データベース内のデータ表示
//----------------------------------------



//---------------------------------------------------------------------------------------------
// ▼DB接続
// 以下の内容を変更しながら使用
// ▶dbname:データベース名  host=使用しているサーバー "root"の場所はID ""の部分はサーバーのパスワードを記述
//---------------------------------------------------------------------------------------------
$dbn ='mysql:dbname=gs_d13_19;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';//DB 接続時のユーザ名
$pwd = '';//DB 接続時のパスワード



//----------------------------------------------------------------
// ▼エラー時の処理設定
// ※「db error:...」が表示されたらdb接続でエラーが発生していることがわかる．
//----------------------------------------------------------------

try {
  $pdo = new PDO($dbn, $user, $pwd);
} catch (PDOException $e) {
  echo json_encode(["db error" => "{$e->getMessage()}"]);
  exit();
}


//----------------------------------------------
// ▼テーブルからデータ取得
// INSERT INTO テーブル名(取得する値の情報)VALUES();
// VALUESで :a1 のように値を一旦置き換える
//----------------------------------------------

$sql = 'SELECT * FROM prompt_fukatsu'; //db内の "prompt_fukatsu" のデータを取得してくる
$stmt = $pdo->prepare($sql);

//----------------------------------------------------------------
// ▼エラー時の処理設定
// ※「db error:...」が表示されたらdb接続でエラーが発生していることがわかる．
//----------------------------------------------------------------

try {
  $status = $stmt->execute();
} catch (PDOException $e) {
  echo json_encode(["sql error" => "{$e->getMessage()}"]);
  exit();
}


//----------------------------------------
// ▼SQL実行後の処理
//----------------------------------------
$output = "";
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $record) {
  //以下が出力形式
    $output .= "<div class='prompt_post shadow_min'>";
    $output .= "<input class='r_prompt_title' type='text' value='{$record["title"]}'></input>";
    $output .="<textarea class='r_prompt_text' name='promptsheet'>{$record["prompt"]}</textarea>";
    $output .="<div class='infobox'>
                <p class='r_prompt_data'>作成日:{$record["created_at"]}</p>
                <p class='r_prompt_data'>最終更新日:{$record["update_at"]}</p>
                <button title='破棄' id='r_clearBtn' type='button'><img src='img/clear.svg' alt='' /></button>
                <button title='更新' id='updateBtn' type='submit'><img src='img/update.svg' alt='' /></button></div>
                </div>";
}
?>



<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROMPT GENERATOR</title>
    <!-- css loading -->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/style_records.css" />
    <!--google fonts  -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Sans+JP:wght@100;200;300;400;500;600;700&display=swap"
        rel="stylesheet">
</head>

<body>
    <main id="outer">
        <!--=================================
        ▼ナビメニュー
        ==================================-->
        <div class="openBtn"><span></span><span></span><span></span></div>
        <nav id="g-nav">
            <ul>
                <li><a href="chatgpt_prompt.php">深津式(基本型)</a></li>
                <li><a href="chatgpt_prompt 2.php">林式(基本型)</a></li>
                <li><a href="chatgpt_prompt 3.php">林式(企画)</a></li>
                <li><a href="chatgpt_prompt 4.php">林式(リサーチ)</a></li>
                <li><a href="chatgpt_prompt 5.php">林式(リポート作成)</a></li>
                <li><a href="chatgpt_prompt 6.php">林式(マニュアル作成)</a></li>
                <li><a href="chatgpt_prompt 7.php">林式(要約)</a></li>
                <li><a href="chatgpt_prompt_records.php">プロンプト一覧1</a></li>
                <li><a href="chatgpt_prompt_records2.php">プロンプト一覧2</a></li>
            </ul>
        </nav>

        <form id="records_box" class="fade" action="update.php" method="POST">
            <?=$output?>
        </form>
    </main>
    <!-- Jquery loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- js file loading -->
    <script src="js/main.js"></script>
    <script src="js/action.js"></script>
</body>

</html>