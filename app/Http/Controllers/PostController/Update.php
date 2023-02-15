<?php

namespace App\Http\Controllers\PostController;

use App\Http\Controllers\Controller;
use App\Http\Requests\UpdatePostRequest;
use App\Models\Image;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Update extends Controller
{
    public function index(Post $post){
        $media = $post->images()->get();
        return view('posts.update', ['id' => $post->id]);
    }

    public function update(Post $post, UpdatePostRequest $request){
        $post->update($request->validated());
        
        if(isset($request->media['added'])){
            foreach($request->media['added'] as $image){
                $from = storage_path('app/public/tmp/uploads/' . $image['name']);
                $to = storage_path('app/public/posts/media/' . $image['name']);
                
                File::move($from, $to);
                $post->images()->create([
                    'name' => $image['name'],
                ]);
            }
        }
        
        if(isset($request->media['removed'])){
            foreach($request->media['removed'] as $image){
                File::delete(storage_path('app/public/posts/media/'.$image['name']));
                Image::where('name', $image['name'])->delete();
            }
        }
        
        return response()->json(['status' => 'success'], 200);
    }

    public function getData(Post $post){
        $media = $post->images()->get();
        return ['post' => $post, 'media'=>$media ];
    }
}
