<?php
// Autoload de Composer
require __DIR__ . '/../vendor/autoload.php';

use Slim\Factory\AppFactory;
use Slim\Views\Twig;
use Slim\Views\TwigMiddleware;
use DI\Container;

// Crear contenedor para las dependencias
$container = new Container();
AppFactory::setContainer($container);

// Configurar la aplicación usando AppFactory
$app = AppFactory::create();

// Configuración del contenedor (Twig)
$container->set('view', function () {
    return Twig::create(__DIR__ . '/../Templates/alumno', ['cache' => false]);
});

// Configuración de la base de datos
$container->set('db', function () {
    $host = '127.0.0.1';       // Cambia por tus datos de conexión
    $db   = 'alumnos';
    $user = 'root';
    $pass = '1234';
    $charset = 'utf8mb4';

    $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
    $options = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false,
    ];

    return new PDO($dsn, $user, $pass, $options);
});

// Añadir el middleware de Twig a la aplicación
$app->add(TwigMiddleware::create($app, $container->get('view')));

// Rutas
require __DIR__ . '/../config/routes.php';

// Manejo de errores (opcional)
$errorMiddleware = $app->addErrorMiddleware(true, true, true);

// Ejecutar la aplicación
$app->run();
