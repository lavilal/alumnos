<?php

namespace App\Controllers;

use App\Models\Curso;
use Slim\Http\Request;
use Slim\Http\Response;

class CursoController
{
    public function index(Request $request, Response $response)
    {
        $cursos = Curso::all();
        return $response->withJson($cursos);
    }

    public function crear(Request $request, Response $response)
    {
        $curso = new Curso();
        $curso->nombre = $request->getParam('nombre');
        $curso->save();
        return $response->withJson($curso);
    }

    public function editar(Request $request, Response $response, $id)
    {
        $curso = Curso::find($id);
        $curso->nombre = $request->getParam('nombre');
        $curso->save();
        return $response->withJson($curso);
    }

    public function eliminar(Request $request, Response $response, $id)
    {
        $curso = Curso::find($id);
        $curso->delete();
        return $response->withStatus(204);
    }
}

