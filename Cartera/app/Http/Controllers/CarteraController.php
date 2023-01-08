<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartera;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
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
    use ApiResponser;
    function __construct()
    {
        //$this->middleware('auth');
    }
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
