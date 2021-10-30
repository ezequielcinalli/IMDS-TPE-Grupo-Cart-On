<?php
include_once "app/controllers/acceptedMaterial.controller.php";
include_once "app/controllers/citizen.controller.php";
include_once "app/controllers/secretary.controller.php";
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
$controllerMain = new MainController();
$controllerCitizen = new CitizenController();
$controllerAcceptedMaterial = new AcceptedMaterialController();
$controllerSecretary= new SecretaryController();

// determina que camino seguir según la acción
switch ($params[0]) {
  //CITIZEN CONTROLLER
    case "registrar-pedido-retiro":
        $controllerCitizen->showRegisterRetirementRequest();
        break;
    case "enviar-orden":
        $controllerCitizen->registerRetirementRequest();
  //ACCEPTEDMATERIAL CONTROLLER
    case "materiales-aceptados":
        $controllerAcceptedMaterial->showAcceptedMaterials();
        break;
    case "condiciones-entrega":
        if (isset($params[1])) {
            $controllerAcceptedMaterial->showDeliveryConditions($params[1]);
        } else {
            $controllerMain->showError404();
        }
        break;
        break;
  //SECRETARY CONTROLLER LOGIN
    case 'login': 
        $controllerSecretary->login();
        break;
    case 'checkLogin': 
        $controllerSecretary->checkLogin();
        break;
  //SECRETARY CONTROLLER - ADMIN SECTION
    case 'admin-materiales': // sección ABM de materiales
        $controllerSecretary->showSecretaryMaterials();
        break;
    case 'insertar-material': //form de admin. boton agregar
        $controllerSecretary->addAcceptedMaterial();
        break;
  //MAIN CONTROLLER
    case "home":
        $controllerMain->showHome();
        break;
    default:
        $controllerMain->showError404();
        break;
}
