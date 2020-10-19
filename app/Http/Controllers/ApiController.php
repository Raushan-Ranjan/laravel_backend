<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\Post;
use App\Models\Comment;
use App\Models\Detail;
use App\Models\Csvreader;


class ApiController extends Controller

{

    function getPost(){

    //     $data = Http::get('https://jsonplaceholder.typicode.com/posts')->json();
    //     foreach($data as $item){

    //     $user = new Post();

    //    $user->id = $item['id'];
    //     $user->title = $item['title'];
    //     $user->body = $item['body'];
    //     $user->save();
    //     }

    $post = DB::select('select * from csvupload ORDER by id DESC');
    return response()->json($post);

    }

    function createPost(Request $request){

        $data = json_decode($request->getContent(), true);
          
        try{

            // DB::beginTransaction();
                 
            foreach($data as $item){ 

                DB::beginTransaction();
                
                $validator = Validator::make($item,[
                    
                    'motor_controller_type_id' => 'bail|required|string',
                    'controller_id' => 'bail|required|string',
                    'lot_no' => 'bail|required|string',
                    'has_uart' => 'bail|string',
                    
                 ]);

                if ($validator->fails()) {
                    print_r('error validation');
                    DB::rollBack();
                    // $fault =  response()->json($validator->errors());
                    // throw new ValidationException($fault);
                    continue;
                }
           
              $user = new Csvreader();
              
              $user->motor_controller_type_id = $item['motor_controller_type_id'];
              $user->controller_id = $item['controller_id'];
              $user->lot_no = $item['lot_no'];
              $user->has_uart = $item['has_uart'];
              $user->save();

           
                print_r("hello ");

                DB::commit();
              
          }
  
        //   DB::commit();

        }catch(Throwable $e){

            // DB::rollBack();
            print_r($e);
            print_r("world");
            
        }

    }

    function getPostById($id){
        $post = Post::find($id);
        return response()->json($post);
    }

    function getComment(){
     
        $post = DB::select('select * from comments');
         return response()->json($post);
       
    }

    function createComment(Request $request){

        $user = new Comment();     
        
        $user->postId = $request->input('postId');
         $user->name = $request->input('name');
         $user->email = $request->input('email');
         $user->body = $request->input('body');
         $user->save();
         return response()->json($user);

    }

    function getCommentById($postId){

        $post = DB::select("SELECT * FROM `comments` WHERE `postId` = '$postId'");
        return response()->json($post);
    }

    function getDetail(){


        $post = DB::select('select * from post_table');
        return response()->json($post);
    }

    function createDetail(Request $request){

        $user = new Detail();
           
            
        $user->id = $request->input('id');
         $user->name = $request->input('name');
         $user->username = $request->input('username');
         $user->email = $request->input('email');
        
         $user->save();
         return response()->json($user);
    }


    function getDetailById($id){
        $post = Post::find($id);
        return response()->json($post);

    }

    function readCsv(Request $request){
       
        $data = json_decode($request->getContent(), true);
        
        $cou = 0; 
          
        try{

            DB::beginTransaction();
                 
            foreach($data as $item){ 

                // $validator = Validator::make($request->all(), [
                //     'photos.profile' => 'required|image',
                // ]);
           
                $validator = Validator::make($item,[
                    'username' => 'bail|required|string',
                    'Identifier' => 'bail|required|integer',
                    'first_name' => 'bail|required|string',
                    'last_name' => 'bail|required|string',
                 ]);

                if ($validator->fails()) {
                    print_r('error validation');
                    $fault =  response()->json($validator->errors());
                    throw new ValidationException($fault);
                }
                // }else{
    
           
              $user = new Csvreader();
              
              $user->username = $item['username'];
              $user->Identifier = $item['Identifier'];
              $user->first_name = $item['first_name'];
              $user->last_name =  $item['last_name'];
              $user->save();

                // }

                print_r("hello ");
              
          }
        
    
          
          DB::commit();

         
        //   print_r("eruka ");

        }catch(Throwable $e){

            DB::rollBack();
            print_r($e);
            print_r("world");
            
        }

    // return view('comments',['data'=>$request]);

    }

    function getCsv(){
        $post = DB::select('select * from csvreaders');
    return response()->json($post);
    }
   
}

