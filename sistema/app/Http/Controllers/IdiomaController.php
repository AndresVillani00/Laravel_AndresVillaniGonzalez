<?php

namespace App\Http\Controllers;

use App\Models\Idioma;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datos['idiomas']=Idioma::paginate(1);
        return view('idioma.index',$datos);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('idioma.create');
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
            'Idioma'=>'required|string|max:100',
            'Nivel'=>'required|string|max:100',
        ];

        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosIdioma = request()->except('_token');
        Idioma::insert($datosIdioma);

        return redirect('idioma')->with('mensaje','Idioma agregado con éxito');
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function show(Idioma $idioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $idioma=Idioma::findOrFail($id);
        return view('idioma.edit',compact('idioma'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $campos=[
            'Idioma'=>'required|string|max:100',
            'Nivel'=>'required|string|max:100',
        ];
        
        $mensaje=[
            'required'=>'El :attribute es requerido'
        ];

        $this->validate($request, $campos, $mensaje);

        $datosIdioma = request()->except(['_token','_method']);
        Idioma::where('id','=',$id)->update($datosIdioma);

        $idioma=Idioma::findOrFail($id);
        //return view('empleado.edit',compact('empleado'));
        return redirect('idioma')->with('mensaje','Idioma Editado con éxito');
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Idioma  $idioma
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Idioma::destroy($id);
        return redirect('idioma')->with('mensaje','Idioma Borrado con éxito');
    }
}
