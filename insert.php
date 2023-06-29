<?php
// var_dump($_POST);
// exit;

//---------------------------------------------------------------
// ▼POSTデータ確認
// 文字列が空、または入力がない場合、exitで処理終了、エラーメッセージを表示
//---------------------------------------------------------------

if(
!isset($_POST["name"])||$_POST["name"]==""||
!isset($_POST["email"])||$_POST["email"]==""||
!isset($_POST["prompt"])||$_POST["prompt"]==""||
!isset($_POST["password"])||$_POST["password"]==""||
!isset($_POST["address"])||$_POST["address"]==""||
!isset($_POST["phone"])||$_POST["phone"]==""||
!isset($_POST["github_url"])||$_POST["github_url"]==""
){
    exit("ParamError");
}

///----------------------------------------
// ▼データ定義
//----------------------------------------
$name=$_POST["name"];
$email=$_POST["email"];
$prompt=$_POST["prompt"];
$password=$_POST["password"];
$address=$_POST["address"];
$phone=$_POST["phone"];
$github_url=$_POST["github_url"];


//---------------------------------------------------------------------------------------------
// ▼DB接続（エラー処理追加）
// 以下の内容を変更しながら使用
// ▶dbname:データベース名  host=使用しているサーバー "root"の場所はID ""の部分はサーバーのパスワードを記述
//---------------------------------------------------------------------------------------------
$dbn='mysql:dbname=prompt;charset=utf8mb4;port=3306;host=localhost';//DB名
$user = 'root'; //DB 接続時のユーザ名
$pwd = ''; //DB 接続時のパスワード


// ※「db error:...」が表示されたらdb接続でエラーが発生していることがわかる．
try {
    $pdo=new PDO($dbn,$user,$pwd);
} catch (PDOException $e) {
echo json_encode(["db error:" => "{$e->getMessage()}"]);
exit();
}


//----------------------------------------------
// ▼データ登録sql登録
// INSERT INTO テーブル名(取得する値の情報)VALUES();
// VALUESで :a1 のように値を一旦置き換える
//----------------------------------------------

$sql=
'INSERT INTO users (id,name,email,prompt,password,address,phone,github_url,indate)
VALUES(NULL,:a1,:a2,:a3,:a4,:a5,:a6,:a7,now())';

//-------------------------------------------------------------------
// ▼バインド変数を設定
// ▼"a1",$name のカタチで値を読み込み
// ▼"a1"のように置き換えて情報を読み込むことで、ハッキングなどから守る事ができる
//-------------------------------------------------------------------

$stmt = $pdo->prepare($sql);

$stmt->bindValue(':a1',$name, PDO::PARAM_STR);
$stmt->bindValue(':a2',$email, PDO::PARAM_STR);
$stmt->bindValue(':a3',$prompt, PDO::PARAM_STR);
$stmt->bindValue(':a4',$password, PDO::PARAM_STR);
$stmt->bindValue(':a5',$address, PDO::PARAM_STR);
$stmt->bindValue(':a6',$phone, PDO::PARAM_STR);
$stmt->bindValue(':a7',$github_url, PDO::PARAM_STR);

//-----------------------------------------------------
// ▼SQL実行（実行に失敗すると `sql error ...` が出力される）
//-----------------------------------------------------
try {
    $status = $stmt->execute();
  } catch (PDOException $e) {
    echo json_encode(["sql error" => "{$e->getMessage()}"]);
    exit();
  }

//   header("Location: study.php");

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
    header("Location: study.php");
    exit;
}

?>