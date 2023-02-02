@extends('layouts.app')

@section('content')

<div class="">
    <div class="mb-4 d-flex">
        <a href="{{route('posts.create')}}" class="btn btn-primary btn-lg rounded-0 text-white ms-auto">Create Post</a>
    </div>
    <table class="table table-striped mb-3 border border-1">
        <thead>
            <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Content</th>
            <th scope="col">Created At</th>
            <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($posts as $post)
                <tr>
                    <th scope="row">{{$post->id}}</th>
                    <td>{{substr($post->title, 0, 20) . '...'}}</td>
                    <td>{{substr($post->content, 0, 50) . '...'}}</td>
                    <td>{{$post->created_at->format('d-m-Y')}}</td>
                    <td>
                        <a class="btn btn-primary btn-sm text-white mx-1" href="{{route('posts.update', $post->id)}}">Update</a>
                        <form action="{{route('posts.destroy',$post->id)}}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button class="btn btn-danger btn-sm text-white mx-1" type="submit">Delete</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table> 
    <div class="d-flex">
        <div class="ms-auto">
            {!! $posts->links() !!}
        </div>
    </div>
</div>

@endsection