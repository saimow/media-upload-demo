<?php

namespace App\Http\Controllers\PostController;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePostRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Create extends Controller
{
    public function index(){
        return view('posts.create');
    }

    public function store(StorePostRequest $request){
        $post = Post::create($request->validated());

        if(isset($request->media)){
            foreach($request->media as $image){
                $from = storage_path('app/public/tmp/uploads/' . $image['name']);
                $to = storage_path('app/public/posts/media/' . $image['name']);
    
                File::move($from, $to);
                $post->images()->create([
                    'name' => $image['name'],
                ]);
            }
        }

        return response()->json(['status' => 'success'], 200);
    }
}
