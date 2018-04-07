@extends('layouts.app')

@section('content')
  <h1>{{ $user->name }}</h1>
<a class="btn btn-warning" href="{{$user->username}}/follows">Sigue a <span class="badge">{{$user->follows->count()}}</span> </a>
<a class="btn btn-warning" href="{{$user->username}}/followers">Seguidores <span class="badge">{{$user->followers->count()}}</span> </a>


@if(Auth::check())

  @if (Gate::allows('dms', $user))
    <form class="" action="/{{$user->username}}/dms" method="post">
      <input type="text" name="message" class="form-control">
      <button type="submit" class="btn btn-success">Enviar Mensaje Privado</button>
    </form>
  @endif

  @if(Auth::user()->isFollowing($user))
    <form action="/{{$user->username}}/unfollow" method="post">
      {{csrf_field()}}
      @if (session('success'))
        <span class="text-success">{{session('success')}}</span>
      @endif
      <button class="btn btn-danger">Dejas de Seguir</button>
    </form>
    @else
      <form action="/{{$user->username}}/follow" method="post">
        {{csrf_field()}}
        @if (session('success'))
          <span class="text-success">{{session('success')}}</span>
        @endif
        <button class="btn btn-primary">Seguir</button>
      </form>
  @endif
@endif


<div class="row">
  @foreach ($user->messages as $message)
    <div class="col-6">
      @include('messages.message')
    </div>
  @endforeach
</div>
@endsection
