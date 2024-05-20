@extends('layouts.admin')

@section('content')

    <header class="py-3 bg-dark text-white">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Writing post</h1>
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">New Post</a>
        </div>
    </header>

    <div class="container " style="margin-top: 1rem">


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif



        <form action="{{route('admin.posts.store')}}" method="post">
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control"@error('title') is-invalid @enderror name="title" id="title" aria-describedby="titlehelpId"
                    placeholder="title" value="{{old('title')}}" />
                <small id="titlehelpId" class="form-text text-muted">Type a title for post </small>
                @error('title')
                <div class="text-danger py-2">
                    {{$message}}

                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="cover_image" class="form-label">cover_image</label>
                <input type="text" class="form-control" @error('cover_image') is-invalid @enderror name="cover_image" id="cover_image" aria-describedby="cover_imagehelpId"
                    placeholder="cover_image" />
                <small id="cover_imagehelpId" class="form-text text-muted">Type a cover_image for post </small>
                @error('cover_image')
                <div class="text-danger py-2">
                    {{$message}}

                </div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="content" class="form-label">Content</label>
                <textarea class="form-control" @error('content') is_invalid @enderror name="content" id="content" rows="5"></textarea>
                @error('title')
                <div class="text-danger py-2">
                    {{$message}}

                </div>
                @enderror
            </div>

            <button
                type="submit"
                class="btn btn-primary"
            >
                Create
            </button>
            



        </form>
    </div>

@endsection
