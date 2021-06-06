<?php

namespace App\Http\Controllers;

use App\Models\Profesor;
use Illuminate\Http\Request;

class ProfesorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['profesores']=Profesor::paginate(1);
        return view('profesor.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profesor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Email'=>'required|email',
            'Telefono'=>'required|string|max:11',
            'Direccion'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProfesor = request()->except('_token');
        Profesor::insert($datosProfesor);

        return redirect('profesor')->with('mensaje','Profesor agregado con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function show(Profesor $profesor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profesor=Profesor::findOrFail($id);
        return view('profesor.edit',compact('profesor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Nombre'=>'required|string|max:100',
            'Apellido'=>'required|string|max:100',
            'Email'=>'required|email',
            'Telefono'=>'required|string|max:11',
            'Direccion'=>'required|string|max:100',
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosProfesor = request()->except(['_token','_method']);
        Profesor::where('id','=',$id)->update($datosProfesor);

        $profesor=Profesor::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('profesor')->with('mensaje','Profesor Editado con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Profesor  $profesor
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Profesor::destroy($id);
        return redirect('profesor')->with('mensaje','Profesor Borrado con éxito');
   
    }
}
