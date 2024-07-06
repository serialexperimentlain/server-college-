<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\PostRequest;

//use宣言は外部にあるクラスをPostController内にインポートできる。
//この場合、App\Models内のPostクラスをインポートしている。
use App\Models\Post;

class PostController extends Controller
{
    public function index(Post $post)//インポートしたPostをインスタンス化して$postとして使用。
    {
        //return $post->get();//$postの中身を戻り値にする。
        return view('posts.index')->with(['posts' => $post->getPaginateByLimit(1)]);  
        //blade内で使う変数'posts'と設定。'posts'の中身にgetを使い、インスタンス化した$postを代入。
    }
    /**
    * 特定IDのpostを表示する
    *
    * @params Object Post // 引数の$postはid=1のPostインスタンス
    * @return Reposnse post view
    */
    public function show(Post $post)
    {
        return view('posts.show')->with(['post' => $post]);
    //'post'はbladeファイルで使う変数．中身は$postはid=1のPostインスタンス．
    }
    public function create()
    {
        return view('posts.create');
    }
    public function store(PostRequest $request, Post $post)//$request:入力データの受け取り，$post空のpostモデル
    {
        $input = $request['post'];//postをキーにもつリクエストパラメータを取得する
        $post->fill($input)->save();//インスタンスのプロパティを上書きする．postモデルがidを持つ．
        return redirect('/posts/' . $post->id);//redirect関数に$post->idを渡すことで，作成した投稿ページへ画面を遷移させる
        //dd($request->all());ダンプ表示
    }
    public function edit(Post $post)
    {
        return view('posts.edit')->with(['post' => $post]);
    }
    public function update(PostRequest $request, Post $post)
    {
        $input__post = $request['post'];
        $post->fill($input__post)->save();
        return redirect('/posts/' . $post->id);
    }
    public function delete(Post $post)
    {
        $post->delete();
        return redirect('/');
    }
}