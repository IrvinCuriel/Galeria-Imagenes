<?php

namespace App\Http\Controllers;

use App\Imagen;
use App\Galeria;
use App\Categoria;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class GaleriaController extends Controller
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
        $categorias = Categoria::all();

        return view('galeria.create', compact('categorias'));
    }

    public function store(Request $request)
    {
        //
        //dd($request->all());
        //$registro = Galeria::create($request->all());
        //return response()->json(compact('registro'));

        // Validación
        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:App\Categoria,id',
            'imagen_principal' => 'required|image|max:1000',
            'descripcion' => 'required|min:5',
            'fecha' => 'required',
            'uuid' => 'required|uuid'
            ]);

        // Guardar la imagen
        $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

        // Resize a la imagen
        $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
        $img->save();

        //Guardar en la BD NOTA: REQUIERE EL 'user_id' EN EL FILLABLE DEL MODELO Galeria
        $galeria = new Galeria($data);
        $galeria->imagen_principal = $ruta_imagen;
        $galeria->user_id = auth()->user()->id;
        $galeria->save();
        return back()->with('estado', 'Tu información se almacenó correctamente');


    }

    public function show(Galeria $galeria)
    {
        //
        return response()->json(compact('registro'));
    }

    public function edit(Galeria $galeria)
    {
        //
    }

    public function update(Request $request, Galeria $galeria)
    {
        //
        //
        $data = $request->validate([
            'nombre' => 'required',
            'categoria_id' => 'required|exists:App\Categoria,id',
            'imagen_principal' => 'image|max:1000',
            'direccion' => 'required',
            'colonia' => 'required',
            'lat' => 'required',
            'lng' => 'required',
            'telefono' => 'required|numeric',
            'descripcion' => 'required|min:50',
            'apertura' => 'date_format:H:i',
            'cierre' => 'date_format:H:i|after:apertura',
            'uuid' => 'required|uuid'
        ]);

        $establecimiento->nombre = $data['nombre'];
        $establecimiento->categoria_id = $data['categoria_id'];
        $establecimiento->direccion = $data['direccion'];
        $establecimiento->colonia = $data['colonia'];
        $establecimiento->lat = $data['lat'];
        $establecimiento->lng = $data['lng'];
        $establecimiento->telefono = $data['telefono'];
        $establecimiento->descripcion = $data['descripcion'];
        $establecimiento->apertura = $data['apertura'];
        $establecimiento->cierre = $data['cierre'];
        $establecimiento->uuid = $data['uuid'];

        // Si el usuario sube una imagen
        if(request('imagen_principal')) {
            // Guardar la imagen
            $ruta_imagen = $request['imagen_principal']->store('principales', 'public');

            // Resize a la imagen
            $img = Image::make( public_path("storage/{$ruta_imagen}") )->fit(800, 600);
            $img->save();

            $establecimiento->imagen_principal = $ruta_imagen;
        }
        $establecimiento->save();

        // Mensaje al usuario
        return back()->with('estado', 'Tu información se almacenó correctamente');
    }

    public function destroy(Galeria $galeria)
    {
        //
        $registro = $registro->delete();
        return response()->json(compact('registro'));
    }
}
