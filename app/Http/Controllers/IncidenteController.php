<?php

namespace App\Http\Controllers;

use App\Models\Incidente;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncidenteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $incidentes = Incidente::all();
        return response()->json(
            [
                "status" => Response::HTTP_OK,
                "message" => "Lista de Incidentes obtenida con exito",
                "data" => $incidentes
            ],
            Response::HTTP_OK
        );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $inputs = $request->input();
        $respuesta = Incidente::create($inputs);
        return response()->json([
            "status" => Response::HTTP_CREATED,
            "message" => "Incidente creado con exito",
            "data" => $respuesta
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $existeid = Incidente::find($id);
        if ($existeid) {
            return response()->json(
                [
                    "status" => Response::HTTP_OK,
                    "message" => " Registro de Incidente obtenido con exito",
                    "data" => $existeid
                ],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => "Incidente no encontrado",
                    "error" => true
                ],
                Response::HTTP_CONFLICT
            );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existe = Incidente::find($id);
        if (isset($existe)) {
            $existe->tipo = $request->tipo;
            $existe->descripcion = $request->descripcion;
            if ($existe->save()) {
                return response()->json(
                    [
                        "status" => Response::HTTP_ACCEPTED,
                        "message" => "Incidente actualizado con exito",
                        "data" => $existe
                    ],
                    Response::HTTP_ACCEPTED
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "error" => true,
                        "message" => "No se pudo actualizar la información del Incidente",
                    ],
                    Response::HTTP_CONFLICT
                );
            }
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => "NO EXISTE EL REGISTRO CON ID =" . $id,
                ],
                Response::HTTP_CONFLICT
            );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $esreal = Incidente::find($id);
        if (isset($esreal)) {
            $res = Incidente::destroy($id);
            if ($res) {
                return response()->json(
                    [
                        "status" => Response::HTTP_OK,
                        "message" => " Registro de Incidente eliminado con exito",
                        "data" => $esreal
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "message" => "No se pudo eliminar el Incidente con ID=" . $id,
                        "error" => true
                    ],
                    Response::HTTP_CONFLICT
                );
            }
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => " No se encontró el Incidente con ID=" . $id,
                    "error" => true
                ],
                Response::HTTP_CONFLICT
            );
        }
    }
}
