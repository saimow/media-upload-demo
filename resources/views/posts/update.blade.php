@extends('layouts.app')

@section('content')

<div class="">
    <div class="mb-4">
        <a class="btn btn-outline-secondary btn-lg" href="{{route('posts')}} ">
            <i class="bi bi-skip-backward-fill"></i>
        </a>
    </div>
    <div class="bg-light border border-1">
        <form action="{{ route('posts.update', $post->id) }}" method="POST" class="p-4">
            @method('PUT')
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{ old('title', $post->title )}}">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="mb-4">
                <label class="form-label">Content</label>
                <textarea name="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" id='content'>{{ old('content', $post->content) }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">update</button>
        </form>
    </div>
</div>
@endsection