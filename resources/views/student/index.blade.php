@extends('theme.base')

@section('content')
<div class="container"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="d-inline">Listado de estudiantes</h3>
                    <a href="{{ route('student.create') }}" class="btn btn-success float-right">Crear Estudiante</a>
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
                        <th>DNI</th>
                        <th>Nombre Completo</th>
                        <th>Materia</th>
                        <th>Nota 1</th>
                        <th>Nota 2</th>
                        <th>Nota 3</th>
                        <th>Nota Final</th>
                        </thead>
                        <tbody>
                            @forelse ($students as $item)
                            <tr>
                                <td>{{$item->DNI}}</td>
                                <td>{{$item->name}} {{$item->lastName}}</td>
                                <td>{{$item->subject}}</td>
                                <td>{{$item->grade1}}</td>
                                <td>{{$item->grade2}}</td>
                                <td>{{$item->grade3}}</td>
                                <td>{{$item->finalGrade}}</td>
                                <td>
                                    <a href="{{ route('student.edit', $item) }}" class="btn btn-warning">Editar</a>
                                    <form action="{{ route('student.destroy', $item) }}" method="post" class="d-inline">
                                        @method('DELETE')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Desea eliminar este estudiante?')">Eliminar</button>

                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No hay registros</td>
                            </tr>
                            @endforelse

                        </tbody>

                    </table>
                    @if ($students->count())
                    {{$students->links()}}
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