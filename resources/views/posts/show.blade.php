@extends('layouts.master')

@section('content')
    {{$success}}
    <div class="container">
        <h1>Post {{$post['id']}}</h1>
        <div class="post">
            <h2>{{$post['title']}}</h2>
            <p>{{$post['body']}}</p>
            <a href="{{route('post.edit', $post['id'])}}">Edit</a>
        </div>
        @if(!is_null($author))
            <div class="author">Posted by {{$author->author_name}}</div>
        @endif
    </div>

@endsection
