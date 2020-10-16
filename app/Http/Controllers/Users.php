<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use App\Models\User;

class Users extends Controller
{
    //

    function list(){
        // DB::insert('insert into users(name,email,password)
        //  values (?,?,?)',[
        //      'Raushan','jack@gmail.com','12345'
        //  ]); 

    //     DB::update('update users set name = ? where id = 1',['Ranjan']);

    //   $user =  DB::select('select * from users');
    //   return $user;

    //  $user = new User();
    //  dd($user);
    // $user->name = 'Ravi';
    // $user->email = 'Ravi@yulu.bike';
    // $user->password = bcrypt('pass123');
    // $user->save();

    // $user = User::all();
    // return $user;

    // User::where('id',1)->delete();

    // User::where('id',2)->update(['name'=>'Aditya gautam']);


    // $user = [
    //     'name' => 'Ram',
    //     'email' => 'ram@bitmesra.ac.in',
    //     'password' => 'password',
    // ];
    //    User::create($user);

    //    $user = User::all();
    //     return $user;

    $data = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
    foreach($data as $item){


        // $row = new YourModel();
        // $row ->column_name1 = $data['DetailedHistoryItem']['date'];
        // $row ->column_name2 = $data['DetailedHistoryItem']['source'];
        // // and so on for your all columns 
        // $row->save();  

        $user = new User();
        $user->name = $item['title'];
        $user->email = $item['body'];
        $user->password = $item['id'];
        $user->save();
    }


         return view('comments');
        
    }
}
