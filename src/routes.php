<?php
use Slim\Routing\RouteCollectorProxy;

$app->group('/alumnos', function (RouteCollectorProxy $group) {
    $group->get('', 'AlumnoController:listarAlumnos'); // Mostrar lista de alumnos
    $group->get('/crear', 'AlumnoController:formularioCrearAlumno'); // Formulario para agregar un alumno
    $group->post('/crear', 'AlumnoController:crearAlumno'); // Guardar alumno
    $group->get('/{id}', 'AlumnoController:verAlumno'); // Ver detalles de un alumno
});

$app->group('/notas', function (RouteCollectorProxy $group) {
    $group->get('/{id}', 'NotaController:verNotas'); // Ver notas de un alumno
    $group->post('/{id}', 'NotaController:agregarNota'); // Agregar o modificar nota
});