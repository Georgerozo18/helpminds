@extends('layouts.app')

@section('content')
  <div class="jumbotron jumbotron-fluid text-center bg-light">
    <h1>Experiencias pedagógicas UPN </h1>
    <nav class="navbar navbar-dark bg-dark">
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a href="/" class="nav-link">Inicio</a>
        </li>
      </ul>
    </nav>
  </div>
  @if (Auth::check())
    <div class="container-fluid">
      <div class="row">
        <form action="/messages/create" method="post">
          {{csrf_field()}}
          <div class="align-items-center">
            <div class="col-auto">
          <div class="input-group mb-2">
            <div class="input-group-prepend">
              <div class="input-group-text">Compartir </div>
            </div>
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
          <div class="col-auto">
          <button type="submit" class="btn btn-primary mb-2">Dejar mensaje</button>
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
