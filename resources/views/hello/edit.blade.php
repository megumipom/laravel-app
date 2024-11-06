<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Edit</title>
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
    <h1>メンバー情報変更</h1>

    <!-- エラーメッセージの表示 -->
    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="/hello/edit" method="post">
    <table>
        @csrf
        <input type="hidden" name="id" value="{{$form->id}}">
        <tr>
            <th>name:</th>
            <td>
                <input type="text" name="name" value="{{$form->name}}">
                @error('name')
                <div style="color: red;">{{ $message }}</div>
            @enderror
            </td>
        </tr>
        <tr>
            <th>mail:</th>
            <td>
                <input type="text" name="mail" value="{{$form->mail}}">
                @error('mail')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th>age:</th>
            <td>
                <input type="text" name="age" value="{{$form->age}}">
                @error('age')
                <div style="color: red;">{{ $message }}</div>
                @enderror
            </td>
        </tr>
        <tr>
            <th></th>
            <td>
                <input type="submit" value="send">
            </td>
        </tr>
    </table>
    </form>

    <p><a href="/hello/">戻る</a></p>

</body>
</html>
