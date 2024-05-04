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

        //para no panginar y ver toda la info en una pagina:
        //$alumnos = Alumno::all();

        // para crear una paginacion realizmaos lo siguiente
        $alumnos = Alumno::paginate(10); // 10 es el numero de alumnos por pagina

        //devolvemos la vista
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
        //  dd($request->input());
        $datos = $request->input(); //importamos los datos
        $alumno = new Alumno($datos); //cremos un nuevo alumno
        $alumno->save();               //lo guardamos
        session()->flash("status","Se a creado el alumno $alumno->nombre");
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
        //returno la vista de edicion con el alumno
        return view("alumnos.edit" , compact("alumno"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAlumnoRequest $request, Alumno $alumno)
    {
        //importamos los datos y los gaurdamos
        $datos = $request->input(); //importamos los datos
        $alumno->update($datos); //actualizmaos los datos
        //añadimos variable flash para notificar de los cambios
        session()->flash("status","Se han actualizado los datos de $alumno->nombre");
        return redirect()->route("alumnos.index"); //devolvemos a la tabla

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Alumno $alumno)
    {
        // metodo borrar alumno
        //mostramos mensaje primero, para no brrar el nombre
        session()->flash("status", "Se ha borrado el alumno $alumno->nombre");
        $alumno->delete();
        return redirect()->route('alumnos.index');

    }
}
