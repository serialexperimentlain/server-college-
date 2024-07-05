<!DOCTYPE HTML>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Posts</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <form action="/posts" method="POST">
            @csrf<!--CSRFトークン-->
            <div class="title">
                <h2>Title</h2>
                <input type="text" name="post[title]" placeholder="タイトル" value={{ old('post.title')}}>
                <p class="title__error" style="color:red">{{ $errors->first('post.title') }}</p>
                <!-- firstの引数にバリデーションのキーを入力することで該当キーのバリデーションエラーを取得できます -->
            </div>
            <div class="body">
                <h2>Body</h2>
                <textarea name="post[body]" placeholder="今日も1日お疲れさまでした。">{{ old('post.body') }}</textarea>
                <p class="title__error" style="color:red">{{ $errors->first('post.body') }}</p>
            </div>
            <input type="submit" value="store"/>
        </form>
        <div class="footer">
            <a href="/">戻る</a>
        </div>
    </body>
</html>