@extends('theme.base')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Listado de Clientes</h3>
                    <a href="{{ route('client.create') }}" class="btn btn-success float-right">Crear Cliente</a>
                </div>
                <div class="card-body">
                    @if (Session::has('Mensaje'))
                    <div class="alert alert-info my-5">
                        {{Session::get('Mensaje')}}
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
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
            </div>
        </div>
    </div>
</div>
<div class="container py-5 text-center">
    <a href="{{ url('/') }}" class="btn btn-primary">Back to Menu</a>
</div>     
@endsection