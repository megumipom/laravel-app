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

    <h1>Person Modelから</h1>
    <table>
        <tr>
            <th>Data</th>
            {{-- <th>Name</th><th>Mail</th><th>Age</th><th>Edit</th><th>Del</th> --}}
        </tr>
        @foreach ($items as $item)
        <tr>
            <td>{{$item->getData()}}</td>
            <td>
                @if ($item->board != null)
                    <table width="100%">
                    @foreach ($item->board as $memo)
                    <tr><td>{{$memo->getData()}}</td></tr>
                    @endforeach
                    </table>
                @endif
            </td>
            {{-- <td>{{$item->name}}</td>
            <td>{{$item->mail}}</td>
            <td>{{$item->age}}</td>
            <td><a href="/hello/edit/?id={{$item->id}}">●</a></td>
            <td><a href="/hello/del/?id={{$item->id}}">×</a></td> --}}
        </tr>
        @endforeach
    </table>

</body>
</html>
