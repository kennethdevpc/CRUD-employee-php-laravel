mostrar la lista de empleados
@if(Session::has('mensaje'))
{{Session::get('mensaje')}}
@endif


<a href="{{url('empleado/create')}}">Crear </a>
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
    @foreach($empleados as $empleado)
        <tr >
            <td>{{$empleado->id}}</td>
            <td>{{$empleado->Foto}} <img src="{{asset('storage'.'/'.$empleado->Foto)}}" alt="" width="100px" ></td>
            <td>{{$empleado->Nombre}}</td>
            <td>{{$empleado->Apellido}}</td>
            <td>{{$empleado->Correo}}</td>
            <td>
                <a href="{{url('/empleado/'.$empleado->id.'/edit')}}">
                    editar
                </a>
                |

                <form action="{{url('/empleado/'.$empleado->id)}}" method="post">
                    @csrf
                    {{ method_field('DELETE') }}
                    <input type="submit"
                           onclick="return confirm('¿quieres borrar deveras?')" value="Borrar">
                </form>

            </td>
        </tr>
    @endforeach
    </tbody>
</table>
