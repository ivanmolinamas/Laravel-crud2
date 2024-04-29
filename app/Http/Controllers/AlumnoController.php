<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Http\Requests\StoreAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;

class AlumnoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // recuperamos infomracion
        $alumnos = Alumno::all();
        return view("alumnos.index",compact("alumnos"));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // para crear redireccionamos a alumnos.create
        return view("alumnos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAlumnoRequest $request)
    {
        //
        //  dd($request->input());

        $datos = $request->input(); //importamos los datos
        $alumno = new Alumno($datos); //cremos un nuevo alumno
        $alumno->save();               //lo guardamos
        return redirect()->route('alumnos.index'); //redireccionamos

    }

    /**
     * Display the specified resource.
     */
    public function show(Alumno $alumno)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Alumno $alumno)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        //
    }
}
