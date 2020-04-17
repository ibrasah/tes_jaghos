<?php
 
namespace App\Http\Controllers;
 
use App\Post;
 
class PostController extends Controller
{
    public function index()
    {
        $select = app('db')->select("SELECT COLUMN_NAME FROM INFORMATION_SCHEMA.COLUMNS WHERE TABLE_NAME='posts'");
        $selects = array();
            foreach ($select as $key) {
                array_push($selects, $key);
            }
        $getPost = Post::OrderBy("id", "DESC")->paginate(10)->toArray();
        $all = app('db')->select("SELECT * FROM posts WHERE id=1");
        $firstname = app('db')->select("SELECT firstname FROM posts WHERE id=1");
        $lastname = app('db')->select("SELECT lastname FROM posts WHERE id=1");
        $gander = app('db')->select("SELECT gender FROM posts WHERE id=1");
        $status = app('db')->select("SELECT status FROM posts WHERE id=1");
        $wherenot = app('db')->select("SELECT id FROM posts WHERE id BETWEEN 0 AND 30");

        $out = [
            "select" => $select,
            "limit" => $getPost["per_page"],
            "condition" => [
                [
                "type" => ["whereColumn"],
                "data" => [$firstname, $lastname
                    ]
                ],
                [
                    "type" => ["whereNull"],
                    "data" => $gander
                ],
                [
                    "type" => ["whereNotIn"],
                    "data" => $status
                ],
                [
                    "type" => ["whereNotIn"],
                    "data" => $status
                ],
                [
                    "type" => ["whereNotBeetwen"],
                    "data" => $wherenot
                ],
                [
                    "type" => ["whereNotBeetwen"],
                    "data" => $wherenot
                ],
            ],
            "current_page" => $getPost["current_page"],
            "order" => $getPost["per_page"],
            "results" => $getPost
        ];
 
        return response()->json($out, 200);
        // $jsonfile = json_encode($data, JSON_PRETTY_PRINT);
        // file_put_contents('jaghos.json', $jsonfile);
    }
}