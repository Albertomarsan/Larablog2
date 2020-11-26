
@extends('layouts.content')
@section('contenido')

    @include('partials.validation-error')

    <form action="{{route("post.store", $post->id)}}" method="POST">
    @include('posts._form')
    </form>

@endsection
