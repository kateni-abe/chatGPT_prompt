//----------------------------------------
// ▼addボタン/深津式（画面左）
//----------------------------------------
$(".fukatsu").on("click", function () {
  let i1 = $("#meirei").text();
  let i2 = $("#anata").text();
  let i3 = "コピーライター";
  let i4 = $("#desu").text();
  let i5 = $("#ika").text();
  let i6 = "\n" + "ネットで話題になる魅力的なタイトル案";
  let i7 = $("#shutsuryoku").text();
  let inputText1 = i1 + "\n" + i2 + i3 + i4 + "\n" + i5 + i6 + i7 + "\n";

  let i8 = $("#seiyaku").text();
  let i9 =
    "・文字数は20文字程度" +
    "\n" +
    "・初学者にもわかりやすく" +
    "\n" +
    "・重要なキーワードを取り残さない" +
    "\n" +
    "・文章を簡潔に";
  let inputText2 = i8 + "\n" + i9 + "\n";

  let i10 = $("#nyuryoku").text();
  let i11 = "ChatGPTをみんなで学ぼう";
  let inputText3 = i10 + "\n" + i11 + "\n";

  let i12 = $("#result_text").text();
  let i13 =
    "・タイトル案1:" +
    "\n" +
    "・タイトル案2:" +
    "\n" +
    "・タイトル案3:" +
    "\n" +
    "・タイトル案4:" +
    "\n" +
    "・タイトル案5:";

  console.log(inputText1);
  let outputText = $("#outputTextArea");
  $(outputText).val(inputText1 + "\n" + inputText2 + "\n" + inputText3 + "\n" + i12 + "\n" + i13);
  $("#prompt_base").val("");
});

//----------------------------------------
// ▼generateボタン（画面左）
//----------------------------------------
$("#geneBtn").on("click", function () {
  let i1 = $("#meirei").text();
  let i2 = $("#anata").text();
  let i3 = $("#write_field1").val();
  let i4 = $("#desu").text();
  let i5 = $("#ika").text();
  let i6 = $("#write_field2").val();
  let i7 = $("#shutsuryoku").text();
  let inputText1 = i1 + "\n" + i2 + i3 + i4 + "\n" + i5 + i6 + i7 + "\n";

  let i8 = $("#seiyaku").text();
  let i9 = $("#write_field3").val();
  let inputText2 = i8 + "\n" + i9 + "\n";

  let i10 = $("#nyuryoku").text();
  let i11 = $("#write_field4").val();
  let inputText3 = i10 + "\n" + i11 + "\n";

  let i12 = $("#result_text").text();
  let i13 = $("#write_field5").val();

  console.log(inputText1);
  let outputText = $("#outputTextArea");
  $(outputText).val(inputText1 + "\n" + inputText2 + "\n" + inputText3 + "\n" + i12 + "\n" + i13);
  $("#prompt_base").val("");
});

//----------------------------------------
// ▼copyボタン（画面右）
//----------------------------------------
$("#copyBtn").on("click", function () {
  if ($("#outputTextArea").val().trim() !== "") {
    let outputText = $("#outputTextArea").val();
    navigator.clipboard
      .writeText(outputText)
      .then(function () {
        alert("プロンプトがコピーされました!");
      })
      .catch(function (error) {
        console.error("コピーに失敗しました", error);
      });
  }
});

//----------------------------------------
// ▼clearボタン（画面右）
//----------------------------------------

$("#clearBtn").on("click", function () {
  if ($("#outputTextArea").val().trim() !== "") {
    if (!confirm("内容を破棄しますか？")) {
      return false;
    } else {
      $("#outputTextArea").val("");
    }
  }
});

//----------------------------------------
// ▼saveボタン（画面右）
//----------------------------------------
$("#saveBtn").on("click", function () {
  let promptTitleVal = $("#prompt_title").val().trim();
  let outputTextAreaVal = $("#outputTextArea").val().trim();

  if (promptTitleVal === "" && outputTextAreaVal === "") {
    // #prompt_titleと#outputTextAreaの両方が空の場合
    $("#saveBtn").attr("type", "button");
  } else if (promptTitleVal === "") {
    // #prompt_titleの中身のみが空の場合
    $("#saveBtn").attr("type", "button");
  } else if (outputTextAreaVal === "") {
    // #outputTextAreaの中身のみが空の場合
    $("#saveBtn").attr("type", "button");
  } else {
    // プロンプトタイトルの中身が空でないかつテキストエリアの中身が空でない場合
    $("#saveBtn").attr("type", "submit");
    alert("プロンプトを保存しました！");
  }
});

$("#saveBtn").on("click", function () {
  let promptTitleVal = $("#prompt_title").val().trim();
  let outputTextAreaVal = $("#outputTextArea").val().trim();

  if (promptTitleVal === "" && outputTextAreaVal === "") {
    // #prompt_titleと#outputTextAreaの両方が空の場合
    alert("プロンプトタイトル、プロンプトを入力してください");
  } else if (promptTitleVal === "") {
    // #prompt_titleの中身のみが空の場合
    alert("プロンプトタイトルを入力してください");
  } else if (outputTextAreaVal === "") {
    // #outputTextAreaの中身のみが空の場合
    alert("プロンプトを入力してください");
  }
});

//----------------------------------------
// ▼openBtn（ナビメニュー）
//----------------------------------------
$(".openBtn").click(function () {
  //ボタンがクリックされたら
  $(this).toggleClass("active"); //ボタン自身に activeクラスを付与し
  $("#g-nav").toggleClass("panelactive"); //ナビゲーションにpanelactiveクラスを付与
});
