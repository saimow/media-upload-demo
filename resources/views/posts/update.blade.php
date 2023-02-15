@extends('layouts.app')

@section('content')

<div class="">
    <div class="mb-4">
        <a class="btn btn-outline-secondary rounded-0" href="{{route('posts')}} ">
            <i class="bi bi-chevron-double-left"></i>
            Back
        </a>
    </div>
    <div class="mb-3">
        <h2>Update Post</h2>
    </div>
    <div class="bg-light border border-1 p-4">
        <div id="app">
            <update-post
                id = '{{ $id }}'
                index-route="{{route('posts')}}"
            ></update-post>
        </div>
    </div>
</div>

@endsection