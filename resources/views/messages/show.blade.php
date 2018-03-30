@extends('layouts.app')

@section('content')
  <h1 class="h3">Mensaje id : {{$message->id}}</h1>
  <img class="img-thumbnail" src="{{ $message->image }}">
  <p class="card-text">
    <div class="text-muted">Escrito por <a href="/{{$message->user->username}}"> {{$message->user->name}}</div>
    {{ $message->content }}</a>
    <a href="/messages/{{ $message->id }}">Leer más</a>
  </p>
@endsection
