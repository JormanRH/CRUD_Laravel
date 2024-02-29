@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
    
    @if (isset($student))
        <h1>Editar Estudiante</h1>
    @else
        <h1>Crear Estudiante</h1>
    @endif
    @if (isset($student))
        <form action="{{ route('student.update', $student) }}" method="post">
        @method('PUT')
    @else
        <form action="{{ route('student.store') }}" method="post">
    @endif
    
        @csrf
        <div class="mb-3">
            <label for="DNI" class="form-label">DNI: </label>
            <input type="text" name="DNI" class="form-control" placeholder="Identificación del estudiante" value="{{old('DNI') ?? @$student->DNI}}">
            <p class="form-text">Identificación del estudiante</p>
            @error('DNI')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="name" class="form-label">Nombre: </label>
            <input type="text" name="name" class="form-control" placeholder="Nombre del estudiante" value="{{old('name') ?? @$student->name}}">
            <p class="form-text">Escriba el nombre de estudiante</p>
            @error('name')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="lastName" class="form-label">Apellido: </label>
            <input type="text" name="lastName" class="form-control" placeholder="Apellido del estudiante" value="{{old('lastName')?? @$student->lastName}}">
            <p class="form-text">Escriba el apellido del estudiante</p>
            @error('lastName')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="subject" class="form-label">Materia: </label>
            <input type="text" name="subject" class="form-control" placeholder="Materia" value="{{old('subject')?? @$student->subject}}">
            <p class="form-text">Escriba la materia</p>
            @error('subject')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="grade1" class="form-label">Nota1: </label>
            <input type="number" name="grade1" class="form-control" placeholder="1ra nota" step="0.01" value="{{old('grade1')?? @$student->grade1}}">
            <p class="form-text">Escriba la 1era nota del estudiante</p>
            @error('grade1')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="grade2" class="form-label">Nota2: </label>
            <input type="number" name="grade2" class="form-control" placeholder="2da nota" step="0.01" value="{{old('grade2')?? @$student->grade2}}">
            <p class="form-text">Escriba la 2da nota del estudiante</p>
            @error('grade2')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        <div class="mb-3">
            <label for="grade3" class="form-label">Nota3: </label>
            <input type="number" name="grade3" class="form-control" placeholder="3ra nota" step="0.01" value="{{old('grade3')?? @$student->grade3}}">
            <p class="form-text">Escriba la 3ra nota del estudiante</p>
            @error('grade3')
            <p class="form-text-text-danger">{{$message}}</p>    
            @enderror
        </div>

        
        @if (isset($student))
            <button type="submit" class="btn btn-primary">Editar Estudiante</button>
            <a href="{{ route('student.store') }}" class="btn btn-danger">Cancelar</a>
        @else
            <button type="submit" class="btn btn-primary">Crear Estudiante</button>
            <a href="{{ route('student.store') }}" class="btn btn-danger">Cancelar</a>
        @endif

        
    </form>
</div>
    
@endsection