<!DOCTYPE html>
<html lang="jp">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>CG制作投稿サイト</title>
        
        <link rel="stylesheet" href="/css/font.css">
        <link href='/css/ress.css'>
        <link href='/css/style.css' rel="stylesheet">
    </head>
    <body>
        <header>
          <h1>プロフィールの編集</h1>
        </header>
        <main class="home_main wrapper">
            <form class="profile_edit_form" action="/users/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="profile_edit_img side">
                    <p>アイコン画像</p>
                    <input type="file" name="image">
                </div>
                <div class="profile_edit_name side">
                    <p>ユーザー名</p>
                    <input type="text" name="user[name]" value="{{ $user->name }}" placeholder="名前を入力してください(必須)">
                </div>
                <div class="error"><p class='name__error' style='color:red'>{{ $errors->first('user.name') }}</p></div>
                <div class="profile_edit_email side">
                    <p>メールアドレス</p>
                    <input type="text" name="user[email]" value="{{ $user->email }}" placeholder="メールアドレスを入力してください(必須)">
                </div>
                <div class="error"><p class='email__error' style='color:red'>{{ $errors->first('user.email') }}</p></div>
                <div class="profile_edit_about side">
                    <p>自己紹介</p>
                    <textarea rows="8" name="user[body]" placeholder="自己紹介文を入力してください">{{ $user->body }}</textarea>
                </div>
                <div class="form_btn"><button type="submit">編集内容の保存</button></div>
            </form>
            <div class="main_description">
                <button type="button" onClick="history.back()">back</button>
            </div>
        </main>
        
        <footer><p class="footer_p"><small>&copy; 2020 CGcotents</small></p></footer>
    </body>
</html>
