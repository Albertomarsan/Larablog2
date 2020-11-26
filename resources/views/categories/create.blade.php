
@extends('layouts.content')
@section('contenido')

    @include('partials.validation-error')

    <form action="{{route("category.store", $category->title)}}" method="POST">
    @include('categories._form')
    </form>

@endsection
