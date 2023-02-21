<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['estudiantes'] = Estudiante::paginate(2); //el nombre estudiantes lo puedo acceder desde las vistas
        return view('estudiante.index', $data); //entonces la vista index toma esa vista index y le pasa $data
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiante.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //--validacion
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
            'Foto'=>'required|max:10000|mimes:jpeg,png,jpg',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
            'Foto.required'=>'La :attribute es requerida'
        ];

        $this->validate($request,$campos,$mensaje);

        //--fin validacion

        //$dataEmployee = request()->all();
        $dataEmployee = request()->except('_token');
        if ($request->hasFile('Foto')) {
            $dataEmployee['Foto'] = $request->file('Foto')->store('/uploads', 'public');


        }
        Estudiante::insert($dataEmployee);
        return redirect('estudiante')->with('mensaje','¡estudiante agregado con exito!');
        return response()->json($dataEmployee);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function show(Estudiante $estudiante)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $estudiante = Estudiante::findOrFail($id);
        return view('estudiante.edit', compact('estudiante'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $idONombreCualquiera)
    {
        //--validacion
        $campos = [
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Correo'=>'required|email',
        ];
        $mensaje = [
            'required'=>'El :attribute es requerido',
        ];
        if ($request->hasFile('Foto')) {
            $campos=['Foto'=>'required|max:10000|mimes:jpeg,png,jpg'];
            $mensaje=['Foto.required'=>'la foto es requerida'];

        }

        $this->validate($request,$campos,$mensaje);

        //--fin validacion

        //$dataEmployee = request()->all();
        //return response()->json($dataEmployee);
        $dataEmployee = request()->except('_token', '_method');
        if ($request->hasFile('Foto')) {
            $estudiante = Estudiante::findOrFail($idONombreCualquiera);
            Storage::delete('public/'.$estudiante->Foto);
            $dataEmployee['Foto'] = $request->file('Foto')->store('/uploads', 'public');


        }

        Estudiante::where('id','=', $idONombreCualquiera)->update($dataEmployee);
        $estudiante = Estudiante::findOrFail($idONombreCualquiera);
        //return view('estudiante.edit', compact('estudiante'));
        return redirect('estudiante')->with('mensaje','!se actualizo el estudiante correctamente¡');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Estudiante $estudiante
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $estudiante = Estudiante::findOrFail($id);
        if(Storage::delete('public/'.$estudiante->Foto)){
            Estudiante::destroy($id);
        }

        Estudiante::destroy($id);
        return redirect('estudiante')->with('mensaje','!se elimino el estudiante correctamente¡');
    }
}
