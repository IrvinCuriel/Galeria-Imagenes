<?php

namespace App\Http\Controllers;

use App\Categoria;
use App\Galeria;
use App\Imagen;
use Illuminate\Http\Request;

class APIController extends Controller
{

    // Método para obtener todos los Galeria
    public function index()
    {
        $establecimientos = Galeria::with('categoria')->get();

        return response()->json($establecimientos);
    }

    // Método para obtener todas las categorias
    public function categorias()
    {
        $categorias = Categoria::all();
        return response()->json($categorias);
    }

    // Muestra los Galeria de la categoria en especifico
    public function categoria( Categoria $categoria )
    {
        $establecimientos = Galeria::where('categoria_id', $categoria->id)->with('categoria')->take(3)->get();

        return response()->json($establecimientos);
    }

    public function establecimientoscategoria( Categoria $categoria )
    {
        $establecimientos = Galeria::where('categoria_id', $categoria->id)->with('categoria')->get();
        return response()->json($establecimientos);
    }


    // Muestra un establecimiento en especifico
    public function show( Galeria $establecimiento ) {

        $imagenes = Imagen::where('id_establecimiento', $establecimiento->uuid)->get();
        $establecimiento->imagenes = $imagenes;

        return response()->json($establecimiento);
    }
}
