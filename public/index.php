<?php 

require_once __DIR__ . '/../includes/app.php';

use Controllers\AdminController;
use Controllers\APIController;
use Controllers\CitaController;
use MVC\Router;
use Controllers\LoginController;
use Controllers\ServicioController;

$router = new Router();

//Iniciar sesion
$router->get('/',[LoginController::class, 'login']);
$router->post('/',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

//Recuperar password
$router->get('/ForgottenPassword',[LoginController::class, 'ForgottenPassword']);
$router->post('/ForgottenPassword',[LoginController::class, 'ForgottenPassword']);
$router->get('/RecoverPassword',[LoginController::class, 'RecoverPassword']);
$router->post('/RecoverPassword',[LoginController::class, 'RecoverPassword']);

//Crear Cuenta
$router->get('/NewAccount',[LoginController::class, 'NewAccount']);
$router->post('/NewAccount',[LoginController::class, 'NewAccount']);

//Confirmar cuenta
$router->get('/ConfirmAccount',[LoginController::class, 'Confirm']);
$router->get('/Message',[LoginController::class, 'Message']);

//Area privada
$router->get('/cita',[CitaController::class,'index']);
$router->get('/admin',[AdminController::class,'index']);

//API DE CITAS
$router->get('/api/servicios',[APIController::class,'index']);
$router->post('/api/citas', [APIController::class,'guardar']);
$router->post('/api/eliminar', [APIController::class,'eliminar']);

//Crud de servicios
$router->get('/servicios',[ServicioController::class,'index']);
$router->get('/servicios/crear',[ServicioController::class,'crear']);
$router->post('/servicios/crear',[ServicioController::class,'crear']);
$router->get('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/actualizar',[ServicioController::class,'actualizar']);
$router->post('/servicios/eliminar',[ServicioController::class,'eliminar']);

// Comprueba y valida las rutas, que existan y les asigna las funciones del Controlador
$router->comprobarRutas();