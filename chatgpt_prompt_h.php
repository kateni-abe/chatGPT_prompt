<?php

?>

<!--==================================
 ▼HTML 
==================================-->
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>PROMPT GENERATOR</title>
    <!-- css loading -->
    <link rel="stylesheet" type="text/css" href="css/reset.css" />
    <link rel="stylesheet" type="text/css" href="css/style.css" />
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
                <li><a href="chatgpt_prompt_h.php">林式(基本型)</a></li>
                <li><a href="chatgpt_prompt 3.php">林式(企画)</a></li>
                <li><a href="chatgpt_prompt 4.php">林式(リサーチ)</a></li>
                <li><a href="chatgpt_prompt 5.php">林式(リポート作成)</a></li>
                <li><a href="chatgpt_prompt 6.php">林式(マニュアル作成)</a></li>
                <li><a href="chatgpt_prompt 7.php">林式(要約)</a></li>
                <li><a href="chatgpt_prompt_records.php">プロンプト一覧1</a></li>
                <li><a href="chatgpt_prompt_records2.php">プロンプト一覧2</a></li>
            </ul>
        </nav>


        <!--==================================
         ▼画面左側
        ==================================-->
        <div id="inner1" class="fade">
            <div id="caption">
                <h2>林式プロンプト（基本型）</h2>
                <p>
                    ChatGPTはユーザーの様々な質問や命令に対し、膨大な学習データの中から確率の高い値を返すAIツールです。<br />
                    より精度の高い値を取得するためには、情報の参照する領域を限定した上で、処理を実行させることが重要です。
                </p>
            </div>
            <!--==================================
         ▼入力エリア
        ==================================-->
            <div id="prompt_basebox" class="shadow">
                <div id="prompt_base">
                    <div id="prompt_2" class="margin_b">
                        <h3 id="seiyaku"># 前提条件</h3>
                        <textarea name="" id="write_field3" class="write_field_h" cols="30" rows="10"
                            placeholder="どんな役割で、どんなゴールを達成したいのかを定義する。"></textarea>
                    </div>
                    <div id="prompt_3" class="margin_b">
                        <h3 id="nyuryoku"># このコンテンツの詳細</h3>
                        <textarea name="" id="write_field4" class="write_field_h" cols="30" rows="10"
                            placeholder="出してほしい成果物を定義する。"></textarea>
                    </div>
                    <div id="prompt_4" class="margin_b">
                        <h3 id="result_text"># 変数の定義と、ゴール設定</h3>
                        <textarea name="" id="write_field5" class="write_field_h" cols="30" rows="10"
                            placeholder="理想の成果物を出してもらうための要素（内容、構成、制約条件など）を書き入れる。"></textarea>
                    </div>
                    <div id="prompt_5" class="margin_b">
                        <h3 id="result_text"># 手順の実行プロセス</h3>
                        <textarea name="" id="write_field6" class="write_field_h" cols="30" rows="10"
                            placeholder="成果物を出すまでの手順、チェックポイント、注意点などを指示する。"></textarea>
                    </div>

                    <div id="prompt_6" class="margin_b">
                        <h3 id="result_text"># ユーザーへの確認事項（指定したい時のみ）</h3>
                        <textarea name="" id="write_field7" class="write_field_h" cols="30" rows="10"
                            placeholder="成果物を出す前に、ユーザー（あなた）に対してGPT側から確認してほしいことを書き入れる。"></textarea>
                    </div>
                    <div id="prompt_7" class="margin_b">
                        <h3 id="result_text"># 例外処理（指定したい時のみ）</h3>
                        <textarea name="" id="write_field8" class="write_field_h" cols="30" rows="10"
                            placeholder="変数や実行プロセスについて例外的に対応する際の基準を書き入れる。"></textarea>
                    </div>
                    <div id="prompt_8" class="margin_b">
                        <h3 id="result_text"># フィードバックループ</h3>
                        <textarea name="" id="write_field9" class="write_field_h" cols="30" rows="10"
                            placeholder="成果物を出す前に、GPT自ら成果物の内容を「改善」するように指示する。"></textarea>
                    </div>
                    <div id="prompt_8" class="margin_b">
                        <h3 id="result_text"># 成果物の生成</h3>
                        <textarea name="" id="write_field9" class="write_field_h" cols="30" rows="10"
                            placeholder="最終的な回答の出し方を指示する。"></textarea>
                    </div>

                    <div id="btnbox1">
                        <!--==================================
                            ▼ボタンエリア１
                        ==================================-->
                        <button title="例文でプロンプトを生成" id="addBtn" class="fukatsu btnAdd ">＋Add</button>
                        <button title="オリジナルプロンプトを生成" id="geneBtn" class="btnAdd ">＋Generate</button>
                    </div>
                </div>
            </div>
            <!--<div id="inner1" class="fade">-->
        </div>


        <!--=================================
         ▼画面右側
        ==================================-->
        <div id="inner2" class="fade">
            <form id="outputbox" class="shadow" action="chatgpt_prompt_storage.php" method="POST">
                <div id="btnbox2">
                    <button title="コピー" id="copyBtn" type="button"><img src="img/copy.svg" alt="" /></button>
                    <button title="破棄" id="clearBtn" type="button"><img src="img/clear.svg" alt="" /></button>
                    <button title="保存" id="saveBtn"><img src="img/save.svg" alt="" /></button>
                    <a title="ChatGPT" href="https://chat.openai.com/" target="_blank"><button id="chatgptBtn"
                            type="button"><img src="img/chatgpt.svg" alt="" /></button></a>

                </div>
                <textarea name="record" id="outputTextArea" cols="30" rows="10"
                    placeholder="こちらに直接記入して、プロンプトを保存することも可能です。"></textarea>
            </form>
        </div>
    </main>
    <!-- Jquery loading -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
    <!-- js file loading -->
    <script src="js/main.js"></script>
    <script src="js/action.js"></script>
</body>

</html>