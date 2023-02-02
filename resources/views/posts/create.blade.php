@extends('layouts.app')

@section('content')

<div class="">
    <div class="mb-4">
        <a class="btn btn-outline-secondary btn-lg" href="{{route('posts')}} ">
            <i class="bi bi-skip-backward-fill"></i>
        </a>
    </div>
    <div class="bg-light border border-1">
        <form action="{{ route('posts.create') }}" method="POST" class="p-4">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                @error('title')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
                    
            </div>
            <div class="mb-4">
                <label class="form-label">Content</label>
                <textarea name="content" cols="30" rows="10" class="form-control @error('content') is-invalid @enderror" id='content'>{{ old('content') }}</textarea>
                @error('content')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</div>
@endsection