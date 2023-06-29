<?php



?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    form fieldset {
        display: flex;
        flex-flow: column;
    }

    input {
        width: 300px;
    }

    #btn {
        width: 100px;
    }
    </style>
</head>

<body>
    <form method="POST" action="insert.php">
        <fieldset>
            <legend>フリーアンケート</legend>
            <label>名前 : <input type="text" name="name"></label><br>
            <label for="">Email : <input type="text" name="email"></label><br>
            <label for=""><textarea name="prompt" id="" cols="40" rows="4"></textarea></label>
            <label for="">Password : <input type="text" name="password"></label><br>
            <label for="">Address : <input type="text" name="address"></label><br>
            <label for="">Phone : <input type="text" name="phone"></label><br>
            <label for="">Github_url : <input type="text" name="github_url"></label><br>
            <input id="btn" type="submit" value="送信">
        </fieldset>
    </form>

</body>

</html>