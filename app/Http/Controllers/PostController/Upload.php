<?php

namespace App\Http\Controllers\PostController;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Upload extends Controller
{
    public function store(Request $request){
        $path = storage_path('app/public/tmp/uploads');

        if (!file_exists($path)) {
            mkdir($path, 0777, true);
        }

        $file = $request->file('image');

        $name = uniqid() . '_' . trim($file->getClientOriginalName());

        $file->move($path, $name);

        return ['name' => $name];
    }

    public function getData(Post $post){
        $images = $post->images;
        return ['media'=>$images];
    }
}
