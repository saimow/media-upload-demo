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
        return view('posts.update', ['post'=>$post, 'media' => $media]);
    }

    public function update(Post $post, UpdatePostRequest $request){
        $post->update($request->validated());
        
        if(isset($request->added_media)){
            foreach($request->added_media as $image){
                $from = storage_path('app/public/tmp/uploads/' . $image);
                $to = storage_path('app/public/posts/media/' . $image);
                
                File::move($from, $to);
                $post->images()->create([
                    'name' => $image,
                ]);
            }
        }
        
        if(isset($request->removed_media)){
            foreach($request->removed_media as $image){
                File::delete(storage_path('app/public/posts/media/'.$image));
                Image::where('name', $image)->delete();
            }
        }
        
        return redirect()->route('posts');
    }
}
