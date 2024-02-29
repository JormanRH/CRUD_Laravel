@extends('theme.base')

@section('content')
<div class="container my-4"> 
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h3>Bienvenido! Elija la opción que desea.</h3>
                </div>
                <div class="card-body btn-group-lg">
                    <div class="row mb-2"> 
                        <a href="{{ route('client.index') }}" class="btn btn-primary">Ver Clientes</a>
                    </div>
                    <div class="row mb-2"> 
                        <a href="{{ route('student.index') }}" class="btn btn-primary btn-group-lg">Ver Estudiantes</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection