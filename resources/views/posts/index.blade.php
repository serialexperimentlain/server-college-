<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Blog</title>
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    </head>
    <body>
        <h1>Blog Name</h1>
        <a href="/posts/create">create</a>
        <div class='posts'>
            @foreach ($posts as $post)
                <div class='post'>
                    <h2 class='title'>
                        <a href="/posts/{{ $post->id }}"><h2 class='title'>{{ $post->title }}</h2></a>
                    </h2>
                    <p class='body'>{{ $post->body }}</p>
                    <form action='/posts/{{ $post->id }}' id='form_{{ $post->id }}' method='POST'>
                        @csrf
                        @method('DELETE')
                        <button type='button' onclick='deletePost({{ $post->id }})'>delete</button>
                    </form>
                </div>
            @endforeach
        </div>
        <div class='paginate'>{{ $posts->links()}}</div>
        <script>
            function deletePost(id)
            {
                'use strict'//コードがstrict（厳格）モードで実行されるようになる。
                if(confirm('削除すると復元できません．\n本当に削除しますか？')){
                    document.getElementById(`form_${id}`).submit();
                    //``の内部は文字列がくる．その中で，変数を使う場合，${変数名}とかく
                }
            }
        </script>
    </body>
</html>