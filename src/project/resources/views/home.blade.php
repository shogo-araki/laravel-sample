<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>top page</title>
</head>
<body>
    <p>こんにちは</p>
    @if(Auth::check())
        <p>{{ \Auth::user()->name }}さん</p>
        <p><a href="/logout">ログアウト</a></p>
    @else
        <p>ゲストさん</p>
        <p><a href="/login">ログイン</a></p>
        <p><a href="/register">会員登録</a></p>
    @endif
</body>
</html>