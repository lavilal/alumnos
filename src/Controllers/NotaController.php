<?php
namespace App\Controllers;

use App\Models\Nota;
use Slim\Http\Request;
use Slim\Http\Response;

class NotaController
{
    public function index(Request $request, Response $response)
    {
        $notas = Nota::all();
        return $response->withJson($notas);
    }

    public function crear(Request $request, Response $response)
    {
        $nota = new Nota();
        $nota->alumno_id = $request->getParam('alumno_id');
        $nota->curso_id = $request->getParam('curso_id');
        $nota->semestre_id = $request->getParam('semestre_id');
        $nota->seccion_id = $request->getParam('seccion_id');
        $nota->nota = $request->getParam('nota');
        $nota->save();
        return $response->withJson($nota);
    }

    public function editar(Request $request, Response $response, $id)
    {
        $nota = Nota::find($id);
        $nota->alumno_id = $request->getParam('alumno_id');
        $nota->curso_id = $request->getParam('curso_id');
        $nota->semestre_id = $request->getParam('semestre_id');
        $nota->seccion_id = $request->getParam('seccion_id');
        $nota->nota = $request->getParam('nota');
        $nota->save();
        return $response->withJson($nota);
    }

    public function eliminar(Request $request, Response $response, $id)
    {
        $nota = Nota::find($id);
        $nota->delete();
        return $response->withStatus(204);
    }
}