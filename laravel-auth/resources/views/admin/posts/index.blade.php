@extends('layouts.admin')


@section('content')
    <header class="py-3 bg-dark text-white">
        <div class="container d-flex align-items-center justify-content-between">
            <h1>Posts</h1>
            <a class="btn btn-primary" href="{{ route('admin.posts.create') }}">New Post</a>
        </div>
    </header>

    <section class="py-5">
        <div class="container">
            <h4 class="text-muted">All posts</h4>
            @include('partials.session-messages')


            <div class="table-responsive">
                <table class="table table-light">
                    <thead>
                        <tr>
                            <th scope="col"> ID </th>
                            <th scope="col"> Cover Image </th>
                            <th scope="col"> Title </th>
                            <th scope="col"> Slug </th>
                            <th scope="col"> Actions </th>

                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($posts as $post)
                            <tr class="">
                                <td scope="row">{{ $post->id }}</td>
                                <td>
                                    <img width="140" src="{{ $post->cover_image }}" alt="{{ $post->title }}">
                                </td>
                                <td>{{ $post->title }}</td>
                                <td>{{ $post->slug }}</td>
                                <td>
                                    <a class="btn btn-dark" href="{{ route('admin.posts.show', $post) }}">
                                        <i class="fa-regular fa-eye fa-xs fa-fw"></i>
                                        <span style="font-size: 0.8rem" class="text-uppercase"> View</span>
                                    </a>
                                    <a class="btn btn-dark" href="{{ route('admin.posts.edit', $post) }}">
                                        <i class="fa fa-pencil" aria-hidden="true"></i>
                                        <span style="font-size: 0.8rem" class="text-uppercase"> Edit</span>
                                    </a>



                                    <!-- Modal trigger button -->
                                    <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                        data-bs-target="#modal-{{ $post->id }}">
                                        Delete
                                    </button>

                                    <!-- Modal Body -->
                                    <!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
                                    <div class="modal fade" id="modal-{{ $post->id }}" tabindex="-1"
                                        data-bs-backdrop="static" data-bs-keyboard="false" role="dialog"
                                        aria-labelledby="modalTitle-{{ $post->id }}" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm"
                                            role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="modalTitle-{{ $post->id }}">
                                                        <i class="fa fa-trash fa-xs fa-fw"></i>
                                                        <span style="font-size: 0.8rem" class="text-uppercase"> Delete
                                                            post</span>
                                                    </h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Destroy this post : {{ $post->title }}
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-bs-dismiss="modal">
                                                        Close
                                                    </button>

                                                    <form action="{{ route('admin.posts.destroy', $post) }}"
                                                        method="post">
                                                        @csrf

                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">
                                                            Confirm
                                                        </button>

                                                    </form>






                                                </div>
                                            </div>
                                        </div>
                                    </div>









                                </td>
                            </tr>
                        @empty

                            <tr class="">
                                <td scope="row" colspan="5">No Posts</td>

                            </tr>
                        @endforelse



                    </tbody>
                </table>
            </div>
        </div>
    </section>
@endsection
