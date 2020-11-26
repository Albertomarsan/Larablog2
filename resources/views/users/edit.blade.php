
@extends('layouts.content')
@section('contenido')

    @include('partials.validation-error')

    <form action="{{route("user.update", $user->id)}}" method="POST">
        @method('PUT')
        @include('users._form', ['pass' => false])
    </form>

@endsection
