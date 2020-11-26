
@extends('layouts.content')
@section('contenido')

    @include('partials.validation-error')

    <form action="{{route("category.update", $category->id)}}" method="POST">
        @method('PUT')
        @include('categories._form')
    </form>

@endsection
