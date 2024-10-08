<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Traits\ApiResponse2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class GanadoController extends Controller
{
    use ApiResponse2;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ganados = Ganado::all();
        return response()->json(
            [
                "status" => Response::HTTP_OK,
                "message" => "Lista de Ganados obtenida con exito",
                "data" => $ganados
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
        $respuesta = Ganado::create($inputs);
        return response()->json([
            "status" => Response::HTTP_CREATED,
            "message" => "Ganado creado con exito",
            "data" => $respuesta
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $existeid = Ganado::find($id);
        if ($existeid) {
            return response()->json(
                [
                    "status" => Response::HTTP_OK,
                    "message" => " Registro de Ganado obtenido con exito",
                    "data" => $existeid
                ],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => "Ganado no encontrado",
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
        $existe = Ganado::find($id);
        if (isset($existe)) {
            $existe->sexo = $request->sexo;
            $existe->raza = $request->raza;
            $existe->proposito = $request->proposito;
            $existe->tipo = $request->tipo;
            $existe->foto = $request->foto;
            if ($existe->save()) {
                return response()->json(
                    [
                        "status" => Response::HTTP_ACCEPTED,
                        "message" => "Ganado actualizado con exito",
                        "data" => $existe
                    ],
                    Response::HTTP_ACCEPTED
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "error" => true,
                        "message" => "No se pudo actualizar la información del Ganado",
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
        $esreal = Ganado::find($id);
        if (isset($esreal)) {
            $res = Ganado::destroy($id);
            if ($res) {
                return response()->json(
                    [
                        "status" => Response::HTTP_OK,
                        "message" => " Registro de Ganado eliminado con exito",
                        "data" => $esreal
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "message" => "No se pudo eliminar el Ganado con ID=" . $id,
                        "error" => true
                    ],
                    Response::HTTP_CONFLICT
                );
            }
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => " No se encontró el Ganado con ID=" . $id,
                    "error" => true
                ],
                Response::HTTP_CONFLICT
            );
        }
    }
    public function ConsultarIncidentePorGanado($id)
    { // para mirar qué incidentes están asignados a cada ganado

        $ganado = Ganado::find($id);

        if (!$ganado) {
            return $this->errorResponse('Ganado no encontrado', 404);
        }
        $incidentes = $ganado->incidentes;

        return $this->successResponse($incidentes, 'Incidentes asignados a cada ganado');
    }
}

