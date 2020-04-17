<?php
 
namespace App\Http\Controllers;
 
use App\User;
 
class UserController extends Controller
{
    public function index()
    {
        $select = app('db')->select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='user'");
        // $limit = app('db')->select("SELECT TOP 100 PERCENT * FROM post");
        // $getPost = Post::OrderBy("id", "DESC")->paginate(10);
        
        $out = [
            "select" => $select,
            // "limit" => $limit,
            // "results" => $getPost
        ];
 
        return response()->json($out, 200);
    }
}