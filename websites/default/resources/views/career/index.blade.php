@extends('layouts.master') 
@section('content')
<div class="container products">
    <div class="row">
        @foreach($career as $post)
        <div class="col-12">
            <div class="postd mb-4 box-shadow">
                <div class="postd-body">
                    <hr>
                    <h4 class="postd-text text-center">{{$post->title}}</h4>
                    <hr>
                    <p>{{$post->body}}</p>
                    <h5 class="text-right small">Posted by
                        <a href="mailto:{{$post->user->email}}">{{$post->user->name}}</a>
                        <br> {{$post->created_at->diffForHumans()}}</h5>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@stop