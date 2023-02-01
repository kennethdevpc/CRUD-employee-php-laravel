
<h1>{{$modo}} Empleado</h1>
<label for="Nombre">Nombre</label>
<input type="text" name="Nombre" id="Nombre" value="{{isset($empleado->Nombre)?$empleado->Nombre:''}}">
<br>

<label for="Apellido">Apellido</label>
<input type="text" name="Apellido" id="Apellido" value="{{isset($empleado->Apellido)?$empleado->Apellido:''}}">
<br>

<label for="Correo">Correo</label>
<input type="text" name="Correo" id="Correo" value="{{isset($empleado->Correo)?$empleado->Correo:''}}">
<br>

<label for="Foto">Foto</label>
@if(isset($empleado->Foto))
<img src="{{asset('storage'.'/'.$empleado->Foto)}}" alt="" height="100px" >
@endif
<input type="file" name="Foto" id="Foto" value="{{isset($empleado->Foto)?$empleado->Foto:''}}">

<br>


<input type="submit" value="* {{$modo}} datos" id="Enviar">


<a href="{{url('empleado')}}">Regresar</a>
