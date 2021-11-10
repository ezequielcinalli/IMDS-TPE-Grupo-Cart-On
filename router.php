<?php
include_once "app/controllers/acceptedMaterial.controller.php";
include_once "app/controllers/citizen.controller.php";
include_once "app/controllers/auth.controller.php";
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
$controllerAuth = new AuthController();
$controllerSecretary = new SecretaryController();

// determina que camino seguir según la acción
switch ($params[0]) {
    //CITIZEN CONTROLLER
  case "registrar-pedido-retiro":
    $controllerCitizen->showRegisterRetirementRequest();
    break;
  case "enviar-orden":
    $controllerCitizen->registerRetirementRequest();
    break;
    //ACCEPTEDMATERIAL CONTROLLER
  case "materiales-aceptados":
    $controllerAcceptedMaterial->showAcceptedMaterials();
    break;
  case "condiciones-entrega":
    $controllerAcceptedMaterial->showDeliveryConditions($params);
    break;
    //AUTH CONTROLLER 
  case 'login':
    $controllerAuth->login();
    break;
  case 'checkLogin':
    $controllerAuth->checkLogin();
    break;
  case 'logout':
    $controllerAuth->logout();
    break;
    //SECRETARY CONTROLLER - ADMIN SECTION
  case 'admin-materiales': // sección ABM de materiales
    $controllerSecretary->showSecretaryMaterials();
    break;
  case 'insertar-material': //form de admin. boton agregar
    $controllerSecretary->addAcceptedMaterial();
    break;
  case 'eliminar-material': //form de admin. boton eliminar
    if (isset($params[1])) {
      $controllerSecretary->deleteAcceptedMaterial($params[1]);
    }
    break;
  case 'editar-material':  //form de admin. boton editar 
    $controllerSecretary->showFormUpdateAcceptedMaterial($params[1]);
    break;
  case 'actualizar-material': //boton del form editar
      $controllerSecretary->updateAcceptedMaterial($params[1]);
      break;
  case 'eliminar-img-material':
      $controllerSecretary->deleteImage($params[1]);
      break;
  case 'cargar-material':
    $controllerSecretary->showMaterialDeposit();
    break;
  case 'cargar-material-peso':
    $controllerSecretary->checkIncomeMaterialDeposit();
    break;
  case 'solicitudes-retiro':
    $controllerSecretary->showRetirementRequests();
    break;
    //MAIN CONTROLLER
  case "home":
    $controllerMain->showHome();
    break;
  default:
    $controllerMain->showError404();
    break;
}
