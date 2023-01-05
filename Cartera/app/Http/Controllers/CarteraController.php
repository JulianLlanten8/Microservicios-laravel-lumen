<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartera;

/* 
    Crud de cartera
    * 1. ObtenerTodo
    * 2. ObtenerUno
    * 3. Crear
    * 4. Actualizar
    * 5. Deshabilitar
*/

class CarteraController extends Controller
{
    /**
     *Retorna la lista de la cartera
     *@return \Illuminate\Http\Response
     */
    public function ObtenerTodo(Request $request)
    {
        $cartera = Cartera::all();
        return response()->json($cartera);
    }

    public function ObtenerUno(Request $request, int $id)
    {
        $cartera = Cartera::find($id);
        return response()->json($cartera);
    }

    public function Crear(Request $request)
    {
        $cartera = new Cartera();
        $cartera->nombre = $request->nombre;
        $cartera->titulo = $request->titulo;
        $cartera->save();
        return response()->json($cartera);
    }


    public function actualizar(Request $request, int $id)
    {
        $cartera = Cartera::find($id);
        $cartera->nombre = $request->nombre;
        $cartera->titulo = $request->titulo;
        $cartera->save();
        return response()->json($cartera);
    }
    public function Deshabilitar(Request $request, int $id)
    {
        $cartera = Cartera::find($id);
        $cartera->delete();
        return response()->json($cartera);
    }
}
