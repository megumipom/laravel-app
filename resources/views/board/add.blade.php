<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>board</h1>

    <form action="/board/add" method="post">
        <table>
            @csrf
            <tr><th>person id:</th><td><input type="number" name="person_id"></td></tr>
            <tr><th>title:</th><td><input type="text" name="title"></td></tr>
            <tr><th>message:</th><td><input type="text" name="message"></td></tr>
            <tr><th></th><td><input type="submit" value="投稿"></td></tr>
        </table>
    </form>
</body>
</html>
