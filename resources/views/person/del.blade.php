<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Del</title>
    <style>
        th{
            background-color: #999;color:#fff;padding: 5px 10px;
        }
        td{
            border: solid 1px #aaa; color: #999; padding: 5px 10px;
        }

    </style>
</head>
<body>
    <h1>person/del</h1>

    <form action="/person/del" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr><th>name:</th><td>{{$form->name}}</td></tr>
        <tr><th>mail:</th><td>{{$form->mail}}</td></tr>
        <tr><th>age:</th><td>{{$form->age}}</td></tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="削除する">
            </td>
        </tr>
    </table>
    </form>

    <p><a href="/person/">戻る</a></p>

</body>
</html>
