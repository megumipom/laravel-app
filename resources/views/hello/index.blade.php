<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>index</title>
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
    <h1>メンバー一覧</h1>

    <table>
        <tr>
            <th>Name</th><th>Mail</th><th>Age</th><th>Edit</th><th>Del</th>
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
            <td><a href="/hello/edit/?id={{$item->id}}">●</a></td>
            <td><a href="/hello/del/?id={{$item->id}}">×</a></td>
        </tr>
        @endforeach
    </table>


    <p><a href="/hello/add/">新メンバー追加</a></p>
</body>
</html>
