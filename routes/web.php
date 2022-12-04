<?php

use App\Models\Post;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/raw', function () {

    $title = 'my code';
    $description = 'my desc code';

    \Illuminate\Support\Facades\DB::insert('insert into tbl_post (title,description,created_at,updated_at) values (:title,:description,:created_at,:updated_at)', [
        'title' => $title,
        'description' => $description,
        'created_at' => date('Y-m-d H:i:s'),
        'updated_at' => date('Y-m-d H:i:s'),
    ]);

    $posts = \Illuminate\Support\Facades\DB::connection('mysql')->select('select * from tbl_post');
    dd($posts);
});


Route::get('/', function () {

    $newPost = new Post();
    $newPost->title = 'salam';
    $newPost->description = 'salam desc';
    $newPost->save();

    // $found = Post::find(5);
    // $found->title = 'updated 5';
    // $found->save();

    //$found = Post::findOrFail(5);
    // $found->delete();

    $posts = Post::where('id', '<=', 6)
        ->get();
    return view('post.list', compact('posts'));
});
