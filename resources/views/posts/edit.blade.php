
@extends('larablog.resources.views.layouts.content')
@section('contenido')

    @include('larablog.resources.views.partials.validation-error')

    <form action="{{route("post.update", $post->id)}}" method="POST">
        @method('PUT')
        @include('posts._form')
    </form>

    <form action="{{route("post.image", $post)}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <input type="file" name="image" class="form-control">
            </div>
            <div class="col">
                <input type="submit" class="btn btn-secondary" value="Subir">
            </div>
        </div>
    </form>

@endsection
