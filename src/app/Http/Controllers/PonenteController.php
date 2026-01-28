<?php

namespace App\Http\Controllers;

use App\Models\Ponente;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Validator;

class PonenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Recuperar todos los recursos
        $ponentes = Ponente::all();

        // Retornar los recursos recuperados
        $respuesta = [
            'ponentes' => $ponentes,
            'status' => 200,
        ];
        return response()->json($respuesta);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Datos faltantes o inválidos',
                'errors' => $validator->errors(),
                'status' => 400,
            ], 400);
        }

        $ponente = Ponente::create($request->only([
            'nombre',
            'biografia',
            'especialidad'
        ]));

        return response()->json([
            'ponente' => $ponente,
            'status' => 201,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Recuperar el recurso especificado
        $ponente = Ponente::find($id);
        // Si el recurso no se pudo recuperar, retornar un mensaje de error
        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404, // No encontrado
            ];
            return response()->json($respuesta, 404);
        }

        // Retornar el recurso recuperado
        $respuesta = [
            'ponente' => $ponente,
            'status' => 200, //ok
        ];
        return response()->json($respuesta);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Recuperar el recurso especificado en el almacenamiento
        $ponente = Ponente::find($id);

        // Si el recurso no se pudo recuperar, retornar un mensaje de error
        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404, // No encontrado
            ];
            return response()->json($respuesta, 404);
        }

        // Validar que la petición contenga todos los datos necesarios
        $validator = Validator::make($request->all(), [
            'nombre' => 'required',
            'biografia' => 'required',
            'especialidad' => 'required'
        ]);

        // Si la petici[on no contiene todos los datos necesarios, retornar un mensaje de error
        if ($validator->fails()) {
            $respuesta = [
                'message' => 'Datos faltantes',
                'status' => 400, //Petición inválido
            ];
            return response()->json($respuesta, 400);
        }

        // Actualizar el recurso especificado con los datos de la petición
        $ponente->nombre = $request->nombre;
        $ponente->biografia = $request->biografia;
        $ponente->especialidad = $request->especialidad;
        $ponente->save();

        //Retornar el recurso actualizado
        $respuesta = [
            'ponente' => $ponente,
            'status' => 200, // ok 
        ];
        return response()->json($respuesta);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Recuperar el recurso especificado

        $ponente = Ponente::find($id);

        // Si el recurso no se pudo recuperar, retornar un mensaje de error

        if (!$ponente) {
            $respuesta = [
                'message' => 'Ponente no encontrado',
                'status' => 404, // No encontrado
            ];
            return response()->json($respuesta, 404);
        }

        // Eliminar el recurso especificado
        $ponente->delete();

        // Retornar un mensaje de éxito
        $respuesta = [
            'message' => 'Ponente eliminado',
            'status' => 200, // ok
        ];
        return response()->json($respuesta);
    }
}
