<?php

namespace App\Http\Controllers;

use App\Models\Ganado;
use App\Models\Incidente;
use App\Traits\ApiResponse2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IncidenteController extends Controller
{
    use ApiResponse2;
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
    public function ConsultarGanadoporIncidente($id)
    { // para mirar qué ganado está involucrado en cada incidente

        $incidente = Incidente::find($id);

        if (!$incidente) {
            return $this->errorResponse('Incidente no encontrado', 404);
        }
        $ganados = $incidente->ganados;

        return $this->successResponse($ganados, 'Animales involucrados en el incidente');
    }
    public function AsignarIncidenteAGanado(Request $request)
    {

        $incidenteId = $request->input('incidente_id');
        $ganadoId = $request->input('ganado_id');

        $incidente = Incidente::find($incidenteId);
        if (!$incidente) {
            return $this->errorResponse('Incidente no encontrado', 404);
        }

        $ganado = Ganado::find($ganadoId);
        if (!$ganado) {
            return $this->errorResponse('Ganado no encontrado', 404);
        }

        if ($incidente->ganados()->where('ganado_id', $ganadoId)->exists()) {
            return $this->errorResponse('Ya fue asignado ese incidente al ganado', 400);
        }

        $incidente->ganados()->attach($ganadoId);

        $data = [
            'incidente' => [
                'id' => $incidente->id,
                'tipo' => $incidente->tipo,
                'descripcion' => $incidente->descripcion
            ],
            'ganado' => [
                'id' => $ganado->id,
                'sexo' => $ganado->sexo,
                'raza' => $ganado->raza,
                'proposito'=> $ganado->proposito,
                'tipo'=> $ganado->tipo,
                'foto'=> $ganado->foto,
                'finca_id'=> $ganado->finca_id,
                'hierro_id'=> $ganado->finca_id,
            ]
        ];
        return $this->successResponse($data, 'Incidente asignado con éxito a ganado');
    }
    public function eliminarIncidenteDeGanado(Request $req)
    {
        $incidenteId = $req->input('incidente_id');
        $ganadoId = $req->input('ganado_id');

        //validar si el incidente existe
        $incidente = Incidente::find($incidenteId);
        if (!$incidente) {

            return $this->errorResponse('Incidente no encontrado', 400);
        }
        //validar si el ganado existe
        $ganado = Ganado::find($ganadoId);
        if (!$ganado) {

            return $this->errorResponse('Ganado no encontrado', 404);
        }

        //eliminar el incidente del ganado
        $incidente->ganados()->detach($ganadoId);

        //preparar la data de respuesta 
        $data = [
            'incidente' => [
                'id' => $incidente->id,
                'tipo' => $incidente->tipo,
                'descripcion' => $incidente->descripcion
            ],
            'ganado' => [
                'id' => $ganado->id,
                'sexo' => $ganado->sexo,
                'raza' => $ganado->raza,
                'proposito'=> $ganado->proposito,
                'tipo'=> $ganado->tipo,
                'foto'=> $ganado->foto,
                'finca_id'=> $ganado->finca_id,
                'hierro_id'=> $ganado->finca_id,
            ]
        ];
        return  $this->successResponse($data, 'Incidente eliminado del ganado con exito');   
    }
}