@extends('layouts.app')

@section('content')
  <div class="jumbotron text-center">
    <h1>Are you ready to become in professional ?</h1>
    <nav>
      <ul class="nav nav-pills">
        <li class="nav-item">
          <a href="/" class="nav-link">Inicio</a>
        </li>
      </ul>
    </nav>
  </div>
  <div class="row">
    <form class="" action="/messages/create" method="post">
      {{csrf_field()}}
      <div class="form-group">
        <input type="text" name="message" class="form-control @if($errors->has('message')) is-invalid @endif" placeholder="que estas pensando">
        @if ($errors->has('message'))
          @foreach ($errors->get('message') as $error)
            <div class="invalid-feedback">
              {{$error}}
            </div>
          @endforeach
        @endif
      </div>
    </form>
  </div>
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
