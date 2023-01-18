<?php

namespace App\Http\Controllers;

use App\MiGaleria;
use App\Galeria;
use App\Categoria;
use Illuminate\Http\Request;

class MiGaleriaController extends Controller
{
    public function index()
    {
        //
        $registros = Galeria::all();
        return response()->json(compact('registros'));
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
        $registro = Galeria::create($request->all());
        return response()->json(compact('registro'));
    }


    public function show(Registro $registro)
    {
        //
        return response()->json(compact('registro'));
    }


    public function edit($id)
    {
        //
    }

    public function update(Registro $registro, Request $request)
    {
        //
        $registro = $registro->update($request->all());
        return response()->json(compact('registro'));
    }


    public function destroy(Registro $registro)
    {
        //
        $registro = $registro->delete();
        return response()->json(compact('registro'));
    }
}
