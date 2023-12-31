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
                <h2>深津式プロンプト</h2>
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
                    <h3 id="meirei">#命令書</h3>
                    <div class="margin_b">
                        <div id="prompt_1a">
                            <p id="anata">あなたは</p>
                            <input id="write_field1" type="text" placeholder="（例）コピーライター" />
                            <p id="desu">です。</p>
                        </div>
                        <div id="prompt_1b" class="flex_col">

                            <p id="ika">以下の制約条件と入力文をもとに</p>
                            <div class="flex_row">
                                <input id="write_field2" type="text" placeholder="（例）ネットで話題になる魅力的なタイトル案" />
                                <p id="shutsuryoku">を出力してください。</p>
                            </div>
                        </div>
                    </div>
                    <div id="prompt_2" class="margin_b">
                        <h3 id="seiyaku">#制約条件</h3>
                        <textarea name="" id="write_field3" class="write_field" cols="30" rows="10"
                            placeholder="（例）※要望やターゲットについて箇条書きで記入してください&#13;・文字数は20文字程度&#13;・初学者にもわかりやすく&#13;・重要なキーワードを取り残さない&#13;・文章を簡潔に"></textarea>
                    </div>
                    <div id="prompt_3" class="margin_b">
                        <h3 id="nyuryoku">#入力文</h3>
                        <textarea name="" id="write_field4" class="write_field" cols="30" rows="10"
                            placeholder="（例）ChatGPTをみんなで学ぼう"></textarea>
                    </div>
                    <div id="prompt_4" class="margin_b">
                        <h3 id="result_text">#出力文</h3>
                        <textarea name="" id="write_field5" class="write_field" cols="30" rows="10"
                            placeholder="（例）&#13;・タイトル案１:&#13;・タイトル案2:&#13;・タイトル案3:&#13;・タイトル案4:&#13;・タイトル案5:"></textarea>
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
                    <div class="btnbox2_innner">
                        <input id="prompt_title" type="text" name="title" placeholder="プロンプトタイトル"></input>
                    </div>
                    <div class="btnbox2_innner">
                        <button title="コピー" id="copyBtn" type="button"><img src="img/copy.svg" alt="" /></button>
                        <button title="破棄" id="clearBtn" type="button"><img src="img/clear.svg" alt="" /></button>
                        <button title="保存" id="saveBtn"><img src="img/save.svg" alt="" /></button>
                        <a title="ChatGPT" href="https://chat.openai.com/" target="_blank"><button id="chatgptBtn"
                                type="button"><img src="img/chatgpt.svg" alt="" /></button></a>
                    </div>

                </div>
                <textarea name="prompt" id="outputTextArea" cols="30" rows="10"
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