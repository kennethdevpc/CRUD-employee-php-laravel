@extends('layouts.app')

@section('content')
    <div class="container">

            @if(Session::has('mensaje'))

            <div class="alert alert-success alert-dismissible" role="alert">
                {{Session::get('mensaje')}}
                <button type="button" class="close" data-bs-dismiss="alert" aria-label="Close">
                    <span arial-hidden="true">&times;</span>
                </button>
            </div>
            @endif

        <a href="{{url('estudiante/create')}}" class="btn btn-success">Crear </a>
            <br>
            <br>
        <table class="table table-light">
            <thead class="thead-light">
            <tr>
                <th>#</th>
                <th>Foto</th>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo</th>
                <th>Acciones</th>
            </tr>
            </thead>

            <tbody>
            @foreach($estudiantes as $estudiante)
                <tr>
                    <td>{{$estudiante->id}}</td>
                    <td>
                        <div  style=" min-width: 100px;max-width: 150px;max-height: 150px;min-height: 100px;">
                            <img  class="img-thumbnail img-fluid" src="{{asset('storage'.'/'.$estudiante->Foto)}}" alt="" width="130px">

                        </div>
                    </td>
                    <td>{{$estudiante->Nombre}}</td>
                    <td>{{$estudiante->Apellido}}</td>
                    <td>{{$estudiante->Correo}}</td>
                    <td>
                        <a href="{{url('/estudiante/'.$estudiante->id.'/edit')}}" class="btn btn-warning">
                            editar
                        </a>
                        |

                        <form action="{{url('/estudiante/'.$estudiante->id)}}" method="post" class="d-inline">
                            @csrf
                            {{ method_field('DELETE') }}
                            <input class="btn btn-danger" type="submit"
                                   onclick="return confirm('¿quieres borrar deveras?')" value="Borrar">
                        </form>

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $estudiantes->links() !!}
    </div>
@endsection
