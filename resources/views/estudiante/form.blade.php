<h1>{{$modo}} Estudiante</h1>
@if(count($errors)>0)
    <h1>hay errrores</h1>
    <div class="alert alert-danger" role="alert">
        <ul>
            @foreach($errors->all() as $error)
                <li>
                    {{$error}}
                </li>
            @endforeach
        </ul>
    </div>

@endif
@if(isset($estudiante->Foto))
    <img class="img-thumbnail img-fluid " src="{{asset('storage'.'/'.$estudiante->Foto)}}" alt="" width="100px">
@endif
<div class="form-group">
    <label for="Nombre">Nombre</label>
    <input class="form-control" type="text" name="Nombre" id="Nombre"
           value="{{isset($estudiante->Nombre)?$estudiante->Nombre:old('Nombre')}}">
</div>

<br>
<div class="form-group">
    <label for="Apellido">Apellido</label>
    <input class="form-control" type="text" name="Apellido" id="Apellido"
           value="{{isset($estudiante->Apellido)?$estudiante->Apellido:old('Apellido')}}">
</div>

<br>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input class="form-control" type="text" name="Correo" id="Correo"
           value="{{isset($estudiante->Correo)?$estudiante->Correo:old('Correo')}}">
</div>

<br>
<div class="form-group">
    <label for="Foto">Foto</label>

    <input class="form-control" type="file" name="Foto" id="Foto" value="{{isset($estudiante->Foto)?$estudiante->Foto:old('Foto')}}">
</div>

<br>
<input class="btn btn-success" type="submit" value="* {{$modo}} datos" id="Enviar">
<a class="btn btn-primary" href="{{url('estudiante')}}">Regresar</a>
