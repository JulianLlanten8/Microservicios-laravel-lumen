<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cartera;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Response;

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
        return $this->successResponse($cartera);
    }

    public function ObtenerUno(Request $request, int $id)
    {
        try {
            $cartera = Cartera::findorfail($id);
            return response()->json($cartera);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }

    public function Crear(Request $request)
    {
        try {
            $this->validate($request, [
                'nombre' => 'required',
                'titulo' => 'required',
            ]);
            $cartera = new Cartera();
            $cartera->nombre = $request->nombre;
            $cartera->titulo = $request->titulo;
            $cartera->save();
            return response()->json($cartera);
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    public function actualizar(Request $request, int $id)
    {
        try {
            $cartera = Cartera::findorfail($id);
            $cartera->fill($request->all());
            if ($cartera->isClean()) {
                return response()->json("No se hicieron cambios", Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $cartera->save();
            return $this->successResponse($cartera);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }


    public function Deshabilitar(Request $request, int $id)
    {
        try {
            $cartera = Cartera::findorfail($id);
            if ($cartera->estado == 0) {
                return response()->json("El registro ya se encuentra deshabilitado", Response::HTTP_UNPROCESSABLE_ENTITY);
            }
            $cartera->delete();
            return $this->successResponse($cartera);
        } catch (\Throwable $th) {
            return response()->json($th->getMessage());
        } catch (\Exception $e) {
            return response()->json($e->getMessage());
        }
    }
}
