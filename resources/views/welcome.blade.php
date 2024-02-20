@extends('theme.base')

@section('content')
<div class="container py-5 text-center">
    <h1>Plantilla principal, welcome.blade in views</h1>
    <p>Bienvenido al CRUD en Laravel, elija la opción que desee</p>

    <a href="{{ route('client.index') }}" class="btn btn-primary">Clients</a>

    <a href="{{ route('student.index') }}" class="btn btn-primary">Students</a>
</div>
    
@endsection