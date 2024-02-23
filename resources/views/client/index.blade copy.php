@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
    <h1>Listado de clientes</h1>
    <a href="{{ route('client.create') }}" class="btn btn-primary">Crear Cliente</a>

    @if (Session::has('Mensaje'))
        <div class="alert alert-info my-5">
            {{Session::get('Mensaje')}}
        </div>
        
    @endif
    <table class="table">
        <thead>
            <th>Nombre</th>
            <th>Saldo</th>
            <th>Comentarios</th>
            <th>Acciones</th>
        </thead>
        <tbody>
            @forelse ($clients as $item)
                <tr>
                    <td>{{$item->name}}</td>
                    <td>{{$item->due}}</td>
                    <td>{{$item->comments}}</td>
                    <td>
                        <a href="{{ route('client.edit', $item) }}" class="btn btn-warning">Editar</a>
                        <form action="{{ route('client.destroy', $item) }}" method="post" class="d-inline">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar este cliente?')">Eliminar</button>

                        </form>
                    </td>
                </tr>
            @empty
            <tr>
                <td colspan="4">No hay registros</td>
            </tr>
            @endforelse
        
        </tbody>

    </table>
    @if ($clients->count())
        {{$clients->links()}}
    @endif
  
    
</div>
    
@endsection