

@extends('layouts.content')
@section('contenido')

<a class="btn btn-primary mt-2 mb-3" href="{{ route('user.create') }}">Crear</a>

<table class="table">
    <thead>
        <tr>
            <td>
                Id
            </td>
            <td>
                Nombre
            </td>
            <td>
                Apellido
            </td>
            <td>
                Email
            </td>
            <td>
                Rol
            </td>
            <td>
                Creación
            </td>
            <td>
                Actualización
            </td>
            <td>
                Acciones
            </td>
        </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
        <tr>
            <td>
                {{ $user->id }}
            </td>
            <td>
                {{ $user->name }}
            </td>
            <td>
                {{ $user->surname }}
            </td>
            <td>
                {{ $user->email }}
            </td>
            <td>
                {{ $user->rol->key }}
            </td>
            <td>
                {{ $user->created_at }}
            </td>
            <td>
                {{ $user->updated_at }}
            </td>
            <td>
               <a href="{{ route('user.show', $user->id) }}" class="btn btn-success">Ver</a>
               <a href="{{ route('user.edit', $user->id) }}" class="btn btn-success">Editar</a>

                <button class="btn btn-danger" type="submit" data-toggle="modal" data-target="#deleteModal" data-id="{{ $user->id }}">Eliminar</button>

            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $users->links() }}


<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea borrar el registro seleccionado?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <form id="formDelete" method="POST" action="{{ route('user.destroy', 0) }}" data-action="{{ route('user.destroy', 0) }}">
                    @method('DELETE')
                    @csrf
                    <button type="submit" class="btn btn-primary">Confirmar</button>
                </form>
            </div>
        </div>
    </div>
</div>

    <script>
        window.onload = function() {
            $('#deleteModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget) // Button that triggered the modal
                var id = button.data('id') // Extract info from data-* attributes
                // If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
                // Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.

                action = $('#formDelete').attr('data-action').slice(0, -1)
                action += id
                console.log(action)

                $('#formDelete').attr('action', action)

                var modal = $(this)
                modal.find('.modal-title').text('Eliminar usuario nº ' + id)
            });
        };
    </script>

@endsection
