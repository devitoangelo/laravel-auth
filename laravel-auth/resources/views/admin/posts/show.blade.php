@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container">
            <h1>{{ $post->title }}</h1>

    
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <div class="row">
                <div class="col">
                    <img width="100%" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                </div>
                <div class="col">
                    <p> <strong>Title</strong> : {{ $post->title }}</p>
                    <p><strong>Description</strong> : {{ $post->content }}</p>
                </div>
            </div>

        </div>
    </section>
@endsection
