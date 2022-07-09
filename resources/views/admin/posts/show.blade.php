@extends('layouts.app')

@section('content')
    <div class="container">
        @if(session('post_created'))
            <div class="alert alert-success" role="alert">
                {{ session('post_created') }}
            </div>
        @endif

        <h1>{{ $post->title }}</h1>
        <h4>Categoria del post : {{ $post->category->name }}</h4>
        <p>{{ $post->content }}</p>
        <a class="btn btn-primary" href="{{ route('admin.posts.index') }}">Torna ai posts</a>
    </div>
@endsection
