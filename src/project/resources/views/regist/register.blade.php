<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>user register form</title>
</head>

<body>
    @if(count($errors)>0)
        <ul>
            @foreach($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif

    <form name="registform" action="/register" method="post" id="registform">
        {{csrf_field()}}
        <dl>
            <dt>名前：</dt>
            <dd>
                <input type="text" name="name" size="30" value="{{ old('name') }}">
                <span>{{$errors->first('name')}}</span>
            </dd>
        </dl>
        <dl>
            <dt>メールアドレス：</dt>
            <dd>
                <input type="text" name="email" size="30" value="{{ old('email') }}">
                <span>{{$errors->first('email')}}</span>
            </dd>
        </dl>
        <dl>
            <dt>パスワード：</dt>
            <dd>
                <input type="password" name="password" size="30">
                <span>{{$errors->first('password')}}</span>
            </dd>
        </dl>
        <dl>
            <dt>パスワード（確認）：</dt>
            <dd>
                <input type="password" name="password_confirmation" size="30">
                <span>{{$errors->first('password_confirmation')}}</span>
            </dd>
        </dl>
        <button type="submit" name="action" value="send">送信</button>
    </form>
</body>

</html>