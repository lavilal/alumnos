<?php
$app->group('/api', function () use ($app) {
    // Rutas para AlumnoController
    $app->get('/alumnos', 'AlumnoController:index');
    $app->post('/alumnos', 'AlumnoController:crear');
    $app->get('/alumnos/{id}', 'AlumnoController:editar');
    $app->delete('/alumnos/{id}', 'AlumnoController:eliminar');

    // Rutas para CursoController
    $app->get('/cursos', 'CursoController:index');
    $app->post('/cursos', 'CursoController:crear');
    $app->get('/cursos/{id}', 'CursoController:editar');
    $app->delete('/cursos/{id}', 'CursoController:eliminar');

    // Rutas para NotaController
    $app->get('/notas', 'NotaController:index');
    $app->post('/notas', 'NotaController:crear');
    $app->get('/notas/{id}', 'NotaController:editar');
    $app->delete('/notas/{id}', 'NotaController:eliminar');
});
