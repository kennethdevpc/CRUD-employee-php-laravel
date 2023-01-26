creacion de empleado
<form action="{{url('empleado')}}" method="post" enctype="multipart/form-data">
    @csrf
    <label for="Nombre">Nombre</label>
    <input type="text" name="Nombre" id="Nombre">
    <br>

    <label for="Apellido">Apellido</label>
    <input type="text" name="Apellido" id="Apellido">
    <br>

    <label for="Correo">Correo</label>
    <input type="text" name="Correo" id="Correo">
    <br>

    <label for="Foto">Foto</label>
    <input type="file" name="Foto" id="Foto">

    <br>
    <input type="submit" name="Enviar" id="Enviar">

</form>
