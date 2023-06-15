<?php
// var_dump($_POST);



//----------------------------------------
// ▼データの受取記述($XXX=$_POST["XXX"]
// ▼textarea name="record"を取得
//----------------------------------------

$record=$_POST["record"];



//----------------------------------------
// ▼データごとに改行
//----------------------------------------

$write_data = "<textarea class='prompt_post shadow_min'>{$record}</textarea>";


//-----------------------------------------------------
// ▼ファイルを開く /file open
// ▼引数"a"は、追加書き込みのみで開く → ファイルがなければ作成
//-----------------------------------------------------

$file = fopen("data/prompt_records.txt","a");


//----------------------------------------
// ▼ファイルをロック / file lock
// ▼他者からの書き込みや攻撃を防ぐ
//----------------------------------------

flock($file,LOCK_EX);

//----------------------------------------
// ▼指定したファイルへ書き込み /file write
//----------------------------------------

fwrite($file, $write_data);


//----------------------------------------
// ▼ファイルのロックを解除する file lock(unlock)
//----------------------------------------

flock($file,LOCK_UN);

//----------------------------------------
// ▼ファイルを閉じる file close
//----------------------------------------

fclose($file);

//----------------------------------------
// ▼データ入力画面に移動
//----------------------------------------

header("Location:chatgpt_prompt.php");


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROMPT GENERATOR</title>
    <!-- css loading -->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
</head>

<body>

</body>

</html>