<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Traits\ApiResponse2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FincaController extends Controller
{
    use ApiResponse2;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $fincas = Finca::all();
        return response()->json(
            [
                "status" => Response::HTTP_OK,
                "message" => "Lista de fincas obtenida con exito",
                "data" => $fincas
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
        $respuesta = Finca::create($inputs);
        return response()->json([
            "status" => Response::HTTP_CREATED,
            "message" => "Finca creada con exito",
            "data" => $respuesta
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $existeid = Finca::find($id);
        if ($existeid) {
            return response()->json(
                [
                    "status" => Response::HTTP_OK,
                    "message" => " Registro de Finca obtenida con exito",
                    "data" => $existeid
                ],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => "Finca no encontrada",
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
        $existe = Finca::find($id);
        if (isset($existe)) {
            $existe->nombre = $request->nombre;
            $existe->ubicacion = $request->ubicacion;
            if ($existe->save()) {
                return response()->json(
                    [
                        "status" => Response::HTTP_ACCEPTED,
                        "message" => "Finca actualizada con exito",
                        "data" => $existe
                    ],
                    Response::HTTP_ACCEPTED
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "error" => true,
                        "message" => "No se pudo actualizar la información de la finca",
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
        $esreal = Finca::find($id);
        if (isset($esreal)) {
            $res = Finca::destroy($id);
            if ($res) {
                return response()->json(
                    [
                        "status" => Response::HTTP_OK,
                        "message" => " Registro de Finca eliminado con exito",
                        "data" => $esreal
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "message" => "No se pudo eliminar la finca con ID=" . $id,
                        "error" => true
                    ],
                    Response::HTTP_CONFLICT
                );
            }
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => " No se encontró la finca con ID=" . $id,
                    "error" => true
                ],
                Response::HTTP_CONFLICT
            );
        }
    }
    public function ConsultarUsuarioPorFinca($id)
    { // para mirar qué usuarios están asignados a cada finca

        $finca = Finca::find($id);

        if (!$finca) {
            return $this->errorResponse('Finca no encontrada', 404);
        }
        $usuarios = $finca->usuarios;

        return $this->successResponse($usuarios, 'Usuarios asignados a cada finca');
    }
}
