<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        th{
            background-color: paleturquoise;color:#fff;padding: 5px 10px;
        }
        td{
            border: solid 1px #aaa; color: #999; padding: 5px 10px;
        }

    </style>
</head>
<body>

    <h1>Person Find</h1>
    <form action="/person/find" method="post">
        @csrf
        <input type="text" name="input" value="{{$input}}">
        <input type="submit" value="find">
    </form>

    @if (isset($item))
    <table>
        <tr>
            <th>Data</th>
        </tr>
        <tr>
            <td>{{$item->getData()}}</td>
        </tr>
    </table>
    @endif

</body>
</html>
