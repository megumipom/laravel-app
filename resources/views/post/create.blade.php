<!-- /resources/views/post/create.blade.php -->

<h1>Create Post</h1>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<!-- Postフォームの作成 -->
<form action="/post" method="post">
    <table>
        @csrf
        <tr>
            <th>title:</th>
            <td>
                <input type="text" name="title">
            </td>
        </tr>
        <tr>
            <th>body:</th>
            <td>
                <input type="text" name="body">
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
