<?php
// exit();

//----------------------------------------
// ▼データをまとめる用の空文字変数
//----------------------------------------

$str="";

//----------------------------------------
// ▼ファイルを開く
// ▼引数"r"は読み込みのみで開く
//----------------------------------------

$file =fopen("data/prompt_records.txt","r");

//----------------------------------------
// ▼ファイルをロック
//----------------------------------------

flock($file,LOCK_EX);

//----------------------------------------
// ▼データの取得
//----------------------------------------

if($file){
    //fgets()で1行ずつ取得 → $lineに格納
    while($line = fgets($file)){
      //取得したデータを`$str`に追加する
      $str .="{$line}";
    }
  }

//----------------------------------------
// ▼ロックを解除する
//----------------------------------------

flock($file,LOCK_UN);

//----------------------------------------
// ▼ファイルを閉じる
//----------------------------------------

fclose($file);

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

        <div id="records_box2" class="fade">
            <?=$str?>
        </div>
        <div id="chat_gpt">
            <iframe src="https://chat.openai.com/" frameborder="0"></iframe>
        </div>
    </main>
    <!-- Jquery loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- js file loading -->
    <script src="js/main.js"></script>
    <script src="js/action.js"></script>
</body>

</html>