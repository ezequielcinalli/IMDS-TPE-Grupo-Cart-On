<?php
include_once "app/controllers/acceptedMaterial.controller.php";
include_once "app/controllers/citizen.controller.php";
include_once "app/controllers/main.controller.php";
include_once 'app/helpers/db.helper.php';

// defino la base url para la construccion de links con urls semánticas
define(
    "BASE_URL",
    "//" .
        $_SERVER["SERVER_NAME"] .
        ":" .
        $_SERVER["SERVER_PORT"] .
        dirname($_SERVER["PHP_SELF"]) .
        "/"
);

// lee la acción
if (!empty($_GET["action"])) {
    $action = $_GET["action"];
} else {
    $action = "home"; // acción por defecto si no envían
}

$params = explode("/", $action);
$controllerCitizen = new CitizenController();
$controllerMain = new MainController();
$controllerAcceptedMaterial = new AcceptedMaterialController();

// determina que camino seguir según la acción
switch ($params[0]) {
    case "home":
        $controllerMain->showHome();
        break;
    case "materiales-aceptados":
        $controllerAcceptedMaterial->showAcceptedMaterials();
        break;
    case "condiciones-entrega":
        // el parametro [1] indica el id o nombre
        if (isset($params[1])) {
            $controllerAcceptedMaterial->showDeliveryConditions($params[1]);
        } else {
            $controllerCitizen->showError404();
        }
        break;
    case "registrar-pedido-retiro":
        $controllerCitizen->showRegisterRetirementRequest();
        break;
    case "enviar-orden":
        $controllerCitizen->registerRetirementRequest();
        break;
    case 'admin-materiales': // sección ABM de materiales
        $controller= new SecretaryController();
        $controller->showSecretaryMaterials();
        break;
    //ABM materiales
    //ADMIN
    case 'insertar-material': //form de admin. boton agregar
        $controller= new SecretaryController();
        $controller->addAcceptedMaterial();
        break;
    default:
        $controllerCitizen->showError404();
        break;
}
