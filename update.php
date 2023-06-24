<?php
//----------------------------------------
// ▼POSTでid,title,promptを取得
//----------------------------------------
$id=$_POST["id"];
$id=$_POST["title"];
$id=$_POST["prompt"];


//---------------------------------------------------------------------------------------------
// ▼DB接続
// 以下の内容を変更しながら使用
// ▶dbname:データベース名  host=使用しているサーバー "root"の場所はID ""の部分はサーバーのパスワードを記述
//---------------------------------------------------------------------------------------------
$dbn ='mysql:dbname=gs_d13_19;charset=utf8mb4;port=3306;host=localhost';
$user = 'root';//DB 接続時のユーザ名
$pwd = '';//DB 接続時のパスワード

// ※「db error:...」が表示されたらdb接続でエラーが発生していることがわかる．
try {
    $pdo=new PDO($dbn,$user,$pwd);
} catch (PDOException $e) {
echo json_encode(["db error:" => "{$e->getMessage()}"]);
exit();
}


//----------------------------------------------
// ▼UPDATE テーブル名 SET ....;で更新(bindvalue)
// INSERT INTO テーブル名(取得する値の情報)VALUES();
// :a1 のように値を一旦置き換える
//----------------------------------------------

$sql=
'UPDATE prompt_fukatsu SET id,title,prompt,created_at,update_at WHERE id=$id';

$stmt->bindValue(':id',$id, PDO::PARAM_INT);
$stmt->bindValue(':title',$title, PDO::PARAM_STR);
$stmt->bindValue(':prompt',$prompt, PDO::PARAM_STR);

$status = $stmt->execute();

 //----------------------------------------
// ▼データ登録処理後
//----------------------------------------
if($status==false){
    //----------------------------------------------------
    // ▼SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    //----------------------------------------------------
    $error=$stmt->errorInfo();
    exit("QueryError:".$error[2]);
}else{
    //--------------------------------------------------
    // index.phpへリダイレクト
    // headerはphp処理が終わったとLocationの場所に遷移する指示
    // ファイル名の前には半角スペース
    //--------------------------------------------------
    header("Location:chatgpt_prompt_record.php");
    exit;
}












?>