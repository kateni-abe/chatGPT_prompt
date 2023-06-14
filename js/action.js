$("#addBtn").on("click", function () {
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

  console.log(inputText1);
  let outputText = $("#outputTextArea");
  $(outputText).val(inputText1 + "\n" + inputText2 + "\n" + inputText3 + "\n" + i12);
  $("#prompt_base").val("");
});

$("#copyBtn").on("click", function () {
  let outputText = $("#outputTextArea").val();
  navigator.clipboard
    .writeText(outputText)
    .then(function () {
      alert("プロンプトがコピーされました!");
    })
    .catch(function (error) {
      console.error("コピーに失敗しました", error);
    });
});

$("#clearBtn").on("click", function () {
  if (!confirm("内容を削除しますか？")) {
    return false;
  } else {
    $("#outputTextArea").val("");
  }
});
