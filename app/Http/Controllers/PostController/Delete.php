<?php

namespace App\Http\Controllers\PostController;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class Delete extends Controller
{
    public function destroy(Post $post){
        $post->delete();

        return redirect()->route('posts');
    }
}
