<?php

namespace App\Http\Controllers;

use App\Models\Finca;
use App\Models\Usuario;
use App\Traits\ApiResponse2;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    use ApiResponse2;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json(
            [
                "status" => Response::HTTP_OK,
                "message" => "Lista de Usuarios obtenida con exito",
                "data" => $usuarios
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
        $inputs['password'] = Hash::make(trim($request->password));
        $respuesta = Usuario::create($inputs);
        return response()->json([
            "status" => Response::HTTP_CREATED,
            "message" => "Usuario creado con exito",
            "data" => $respuesta
        ], Response::HTTP_CREATED);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $existeid = Usuario::find($id);
        if ($existeid) {
            return response()->json(
                [
                    "status" => Response::HTTP_OK,
                    "message" => " Registro de Usuario obtenido con exito",
                    "data" => $existeid
                ],
                Response::HTTP_OK
            );
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => "Usuario no encontrado",
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
        $existe = Usuario::find($id);
        if (isset($existe)) {
            $existe->nombre_usuario = $request->nombre_usuario;
            $existe->password = Hash::make(trim($request->password));
            $existe->rol = $request->rol;
            $existe->nombre = $request->nombre;
            $existe->apellido = $request->apellido;

            if ($existe->save()) {
                return response()->json(
                    [
                        "status" => Response::HTTP_ACCEPTED,
                        "message" => "Usuario actualizado con exito",
                        "data" => $existe
                    ],
                    Response::HTTP_ACCEPTED
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "error" => true,
                        "message" => "No se pudo actualizar la información del usuario",
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
        $esreal = Usuario::find($id);
        if (isset($esreal)) {
            $res = Usuario::destroy($id);
            if ($res) {
                return response()->json(
                    [
                        "status" => Response::HTTP_OK,
                        "message" => " Registro de Usuario eliminado con exito",
                        "data" => $esreal
                    ],
                    Response::HTTP_OK
                );
            } else {
                return response()->json(
                    [
                        "status" => Response::HTTP_CONFLICT,
                        "message" => "No se pudo eliminar el usuario con ID=" . $id,
                        "error" => true
                    ],
                    Response::HTTP_CONFLICT
                );
            }
        } else {
            return response()->json(
                [
                    "status" => Response::HTTP_CONFLICT,
                    "message" => " No se encontró el usuario con ID=" . $id,
                    "error" => true
                ],
                Response::HTTP_CONFLICT
            );
        }
    }
    public function ConsultarFincaporUsuario($id)
    { // para mirar qué fincas gestiona cada usuario

        $usuario = Usuario::find($id);

        if (!$usuario) {
            return $this->errorResponse('Usuario no encontrado', 404);
        }
        $fincas = $usuario->fincas;

        return $this->successResponse($fincas, 'Fincas que gestiona el usuario');
    }
    public function AsignarUsuarioAFinca(Request $request)
    {

        $usuarioId = $request->input('usuario_id');
        $fincaId = $request->input('finca_id');

        $usuario = Usuario::find($usuarioId);
        if (!$usuario) {
            return $this->errorResponse('Usuario no encontrado', 404);
        }

        $finca = Finca::find($fincaId);
        if (!$finca) {
            return $this->errorResponse('Finca no encontrada', 404);
        }

        if ($usuario->fincas()->where('finca_id', $fincaId)->exists()) {
            return $this->errorResponse('Ya fue asignado ese usuario a la finca', 400);
        }

        $usuario->fincas()->attach($fincaId);

        $data = [
            'usuario' => [
                'id' => $usuario->id,
                'nombre_usuario' => $usuario->titulo,
                'rol' => $usuario->rol,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
            ],
            'finca' => [
                'id' => $finca->id,
                'nombre' => $finca->nombre,
                'ubicacion' => $finca->ubicacion,
            ]
        ];
        return $this->successResponse($data, 'Usuario asignado con éxito a finca');
    }
    public function eliminarUsuarioDeFinca(Request $req)
    {
        $usuarioId = $req->input('usuario_id');
        $fincaId = $req->input('finca_id');

        //validar si el usuario existe
        $usuario = Usuario::find($usuarioId);
        if (!$usuario) {

            return $this->errorResponse('Usuario no encontrado', 400);
        }
        //validar si la finca existe
        $finca = Finca::find($fincaId);
        if (!$finca) {

            return $this->errorResponse('Finca no encontrada', 404);
        }

        //eliminar el usuario de la finca
        $usuario->fincas()->detach($fincaId);

        //preparar la data de respuesta 
        $data = [
            'usuario' => [
                'id' => $usuario->id,
                'nombre_usuario' => $usuario->nombre_usuario,
                'rol' => $usuario->rol,
                'nombre' => $usuario->nombre,
                'apellido' => $usuario->apellido,
            ],
            'finca' => [
                'id' => $finca->id,
                'nombre' => $finca->nombre,
                'ubicacion' => $finca->ubicacion,
            ]
        ];
        return  $this->successResponse($data, 'Usuario eliminado de la finca con exito');
    }
}
