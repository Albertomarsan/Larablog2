
@extends('layouts.content')
@section('contenido')


        @csrf
        <div class="form-group">
            <label for="title">Título</label>
        <input readonly class="form-control" type="text" name="title" id="title" value="{{ $category->title }}">
        </div>

        <div class="form-group">
            <label for="url_clean">Url limpio</label>
            <input readonly class="form-control" type="text" name="url_clean" id="url_clean" value="{{ $category->url_clean }}">
        </div>

        <input type="submit" value="enviar" class="btn btn-primary">

@endsection
