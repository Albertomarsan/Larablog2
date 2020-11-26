
@extends('layouts.content')
@section('contenido')

    @include('partials.validation-error')

    <form action="{{route("user.store", $user->name)}}" method="POST">
        @include('users._form', ['pass' => true])
    </form>

@endsection
