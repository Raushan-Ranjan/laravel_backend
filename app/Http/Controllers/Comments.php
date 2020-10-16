<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Comments extends Controller
{
    //
    function getcomment($id){
        // https://jsonplaceholder.typicode.com/posts/1/comments

        $data = Http::get('https://jsonplaceholder.typicode.com/posts/$id/comments')->json();
        return view('comments',['data'=>$id]);
    }
}
