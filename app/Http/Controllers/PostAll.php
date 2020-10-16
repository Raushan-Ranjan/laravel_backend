<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;


use App\Post;

class PostAll extends Controller
{
    //

    function list(){
        // return Post::all();

        $data = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
        return view('post',['data'=>$data]);
}

// public function save(){
//   return Post::all();
// }
}
