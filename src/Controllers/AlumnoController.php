<?php
namespace App\Controllers;

use App\Models\Alumno;
use Slim\Http\Request;
use Slim\Http\Response;

class AlumnoController
{
    public function index(Request $request, Response $response)
    {
        $alumnos = Alumno::all();
        return $response->withJson($alumnos);
    }

    public function crear(Request $request, Response $response)
    {
        $alumno = new Alumno();
        $alumno->nombres = $request->getParam('nombres');
        $alumno->apellidos = $request->getParam('apellidos');
        $alumno->fecha_nacimiento = $request->getParam('fecha_nacimiento');
        $alumno->fotografía = $request->getParam('fotografía');
        $alumno->carrera_id = $request->getParam('carrera_id');
        $alumno->save();
        return $response->withJson($alumno);
    }

    public function editar(Request $request, Response $response, $id)
    {
        $alumno = Alumno::find($id);
        $alumno->nombres = $request->getParam('nombres');
        $alumno->apellidos = $request->getParam('apellidos');
        $alumno->fecha_nacimiento = $request->getParam('fecha_nacimiento');
        $alumno->fotografía = $request->getParam('fotografía');
        $alumno->carrera_id = $request->getParam('carrera_id');
        $alumno->save();
        return $response->withJson($alumno);
    }

    public function eliminar(Request $request, Response $response, $id)
    {
        $alumno = Alumno::find($id);
        $alumno->delete();
        return $response->withStatus(204);
    }
}