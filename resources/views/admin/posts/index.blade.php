@extends('layouts.app')

@section('content')
    <div class="container">

        @if(session('post_deleted'))
            <div class="alert alert-success" role="alert">
                {{ session('post_deleted') }}
            </div>
        @endif

        @foreach ($categories as $category)

        <h1>Post per {{ $category->name }}</h1>
        <table class="table">
            <thead>
                <tr>
                  <th scope="col">ID</th>
                  <th style="width: 250px" scope="col">Titolo</th>
                  <th scope="col">Bottoni</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($posts as $post)
                    @if ($post->category_id == $category->id)
                    <tr>
                        <th scope="row">{{ $post->id }}</th>
                        <th>{{ $post->title }}</th>
                        <th>
                            <a class="text-uppercase btn btn-primary" href="{{ route('admin.posts.show', $post) }}">show</a>
                            <a class="text-uppercase btn btn-dark mx-3" href="{{ route('admin.posts.edit', $post) }}">edit</a>

                            <form class="d-inline" action="{{ route('admin.posts.destroy', $post) }}" method="post"
                            onsubmit="return confirm('Vuoi davvero eliminare il post: {{ $post->title }}?')">
                            @csrf
                            @method('DELETE')
                                <input class="text-uppercase btn btn-danger" type="submit" value="delete">
                            </form>
                        </th>
                    </tr>
                    @endif
                @endforeach
            </tbody>
        </table>

        @endforeach

    </div>
@endsection
