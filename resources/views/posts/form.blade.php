@extends('layouts.master')

@section('content')
    <style>
        input{
            width: 100%;
            margin: 0 0 15px 0;
            height: 25px;
        }

        textarea{
            width: 100%;
            margin: 0 0 15px 0;
            height: 80px;
        }
    </style>
    <div class="container">
        <div class="post">
            <form action="{{route('post.update', $post['id'])}}" method="post">
                @csrf
                <label>
                    <span>Title</span>
                    <input type="text" name="title" value="{{$post['title']}}">
                </label>
                <label>
                    <span>Body</span>
                    <textarea name="body" >
                        {{$post['body']}}
                    </textarea>
                </label>
                <button type="submit">Change</button>
            </form>
            @if(!is_null($author))
                <div class="author">Posted by {{$author->author_name}}</div>
            @endif
        </div>

    </div>

@endsection
