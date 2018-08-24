@extends('layouts.app')

@section('content')
  <div class="jumbotron jumbotron-fluid text-center bg-light">
    <h1>Experiencias pedagógicas UPN </h1>
    {{-- menu --}}
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarMenu">

        <ul class="navbar-nav mr-auto">
          <li class="nav-item active">
            <a href="/" class="nav-link">Inicio</a>
          </li>
          <li class="nav-item">
            <a href="/diplomas" class="nav-link">Diplomas</a>
          </li>
          <li class="nav-item">
            <a href="/students" class="nav-link">Estudiantes</a>
          </li>
        </ul>

      </div>

    </nav>
    {{-- menu --}}
  </div>

  @if (Auth::check())
    <div class="container-fluid">
      <div class="row">
        <form action="/messages/create" method="post" class="form-inline" enctype="multipart/form-data">
          {{csrf_field()}}
          <div class="form-group mb-2">
            <div class="col-sm-12">
          <div class="form-group mx-sm-3 mb-2">
            <input  name="message"  type="text" class="form-control @if($errors->has('message')) is-invalid @endif" id="inlineFormInputGroup" placeholder="Dejar un mensaje">
          </div>
        </div>
            @if ($errors->has('message'))
              @foreach ($errors->get('message') as $error)
                <div class="invalid-feedback">
                  {{$error}}
                </div>
              @endforeach
            @endif
          </div>
          <div class="form-group mb-2">
            <input type="file" name="image" class="form-control-file" required>
          </div>
          <div class="form-group mb-2">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary mb-2">Dejar mensaje</button>
            </div>
        </div>
        </form>
      </div>
    </div>
  @endif
  <div class="row">
    @forelse ($messages as $message)
      <div class="col-6">
        @include('messages.message')
      </div>
    @empty
      <p>No hay mas mensajes.</p>
    @endforelse
    @if (count($messages))
      <div class="mt-2 mx-auto">
      {{$messages->links('pagination::bootstrap-4')}}
      </div>
    @endif
  </div>
@endsection
