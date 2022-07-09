@extends('layouts.app')

@section('content')
    <div class="container _container">
        <form action="{{ route('admin.posts.update', $post) }}" method="post">
        @csrf
        @method('PUT')

            {{-- titolo --}}
            <label for="title">Titolo:</label>

            @error('title')
                {{ $message }}
            @enderror

            <input type="text" name="title"
            @if (!$errors->any())
                value="{{ $post->title }}"
            @else
                value="{{ old('title') }}"
            @endif
            class="form-control @error('title') is-invalid @enderror">


            {{-- select --}}
            <label for="category_id">Categoria del post:</label>

            @error('title')
                {{ $message }}
            @enderror

            <select name="category_id"
            class="mb-5 @error('category_id') is-invalid @enderror"
            {{-- @if (!$errors->any())
                value="{{ $post->category_id }}"
            @else
                value="{{ old('category_id') }}"
            @endif> --}} >

                @foreach ($categories as $category)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach

            </select>


            {{-- corpo del post --}}
            <label for="content">Corpo:</label>

            @error('content')
                {{ $message }}
            @enderror

            @if (!$errors->any())

                <textarea name="content" cols="30" rows="10"
                class="form-control @error('content') is-invalid @enderror">{{ $post->content }}</textarea>

            @else

                <textarea name="content" cols="30" rows="10"
                class="form-control @error('content') is-invalid @enderror">{{ old('content') }}</textarea>

            @endif

            <input class="btn btn-primary text-center text-uppercase" type="submit" value="aggiorna">

        </form>
    </div>
@endsection
