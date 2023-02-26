@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Posts</h1>
        @foreach($posts as $post)
            <div class="post">
                <h2>{{$post['title']}}</h2>
                <p>{{$post['body']}}</p>
                <a href="{{route('post.edit', $post['id'])}}">Edit</a>
                <a href="{{route('post.show', $post['id'])}}">Show</a>
            </div>
        @endforeach

        {{$posts->setPath('posts')->render()}}
    </div>

@endsection
