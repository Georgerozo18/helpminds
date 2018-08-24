@extends('layouts.app')

@section('content')
  <h1>Estudiante : {{$student->nombre_apellido}}</h1>
  <img src="{{$student->image}}">
  <h2>Cedula : {{$student->cedula}}</h2>
  <h2>Materia : {{$student->nom_materia}}</h2>
  <h2>Codigo de materia : {{$student->cod_materia}}</h2>
  <h2>Grupo de materia : {{$student->grupo}}</h2>
  <h2>Nota : {{$student->nota}}</h2>
  <a href="/students">Estudiantes</a>
@endsection
