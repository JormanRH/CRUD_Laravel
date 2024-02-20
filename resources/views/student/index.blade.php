@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
    <h1>Listado de estudiantes</h1>
    <a href="{{ route('student.create') }}" class="btn btn-primary">Crear Estudiante</a>
<br>
@if (Session::has('Mensaje'))
<div class="alert alert-info my-5">
    {{Session::get('Mensaje')}}
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
    
@endsection