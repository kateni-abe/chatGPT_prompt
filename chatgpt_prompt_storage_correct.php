<?php
//----------------------------------------
// ▼上書き処理するためのphp
//----------------------------------------

// var_dump($_POST);



//----------------------------------------
// ▼データの受取記述($XXX=$_POST["XXX"]
// ▼textarea name="promptsheet"を取得
//----------------------------------------

$promptsheet=$_POST["promptsheet"];



//----------------------------------------
// ▼
//----------------------------------------

$write_data = "<textarea class='prompt_post shadow_min' name='promptsheet'>{$promptsheet}</textarea>";


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

fputs($file, $write_data);


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

header("Location:chatgpt_prompt_records.php");


?>