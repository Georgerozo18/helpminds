<div class="container-fluid">

  <div class="row">
    <table class="table table-hover">
      <thead>
        <tr>
          <th class="">20101</th>
          <th class="">Apellido Nombre</th>
          <th class="">Perfil</th>
        </tr>
      </thead>

      <tbody>
        @forelse ($students as $student)
        <tr>
          <th scope="col">{{$student->id}}</th>
          <td>{{$student->nombre_apellido}}</td>
          <td><a href="/students/{{$student->id}}">Ver</a></td>
        </tr>
      @empty
        <div class="mt-2 mx-auto">
          <p>No hay estudiantes!</p>
        </div>
      @endforelse

      </tbody>
    </table>
    @if (count($students))
      <div class="mt-2 mx-auto">
      {{$students->links('pagination::bootstrap-4')}}
      </div>
    @endif
  </div>

</div>
