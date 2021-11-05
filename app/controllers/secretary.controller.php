<?php
include_once "app/models/acceptedMaterial.model.php";
include_once "app/models/materialDeposit.model.php";
include_once "app/models/cartoneroModel.php";
include_once "app/views/secretary.view.php";
include_once "app/views/main.view.php";
include_once 'app/helpers/auth.helper.php';

class SecretaryController
{
  private $model;
  private $modelCartonero;
  private $modelMaterialDeposit;
  private $view;
  private $viewMain;
  private $authHelper;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->model = new AcceptedMaterialModel();
    $this->modelCartonero = new CartoneroModel();
    $this->modelMaterialDeposit = new MaterialDepositModel();
    $this->view = new SecretaryView();
    $this->viewMain = new MainView();
    $this->authHelper = new AuthHelper();
  }

  /**
   * Construye un nombre unico de archivo y lo mueve a la carpeta de img
   */
  function uniqueSaveName($realName, $temporalName)
  {
    $filePath = "images/" . uniqid("", true) . "."
      . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

    move_uploaded_file($temporalName, $filePath); //funcion que mueve archivos

    return $filePath;
  }

  /**
   * Agrega un nuevo material aceptado a la DB
   */
  function addAcceptedMaterial()
  {

    $material = $_POST['material'];
    $deliveryMethod = $_POST['deliveryMethod'];

    if (empty($material) || empty($deliveryMethod)) {
      $this->viewMain->showError404();
      die();
    }

    if (
      $_FILES['input_name']['type'] == "image/jpg" ||
      $_FILES['input_name']['type'] == "image/jpeg" ||
      $_FILES['input_name']['type'] == "image/png"
    ) { //si es alguno de estos formatos de imagen
      $realName = $this->uniqueSaveName(
        $_FILES['input_name']['name'], //nombre real aporta la extension del archivo
        $_FILES['input_name']['tmp_name']
      );
      $success = $this->model->insert($material, $deliveryMethod, $realName);
    } else {
      $success = $this->model->insert($material, $deliveryMethod);
    }

    // redirigimos al listado
    if ($success) {
      header("Location: " . BASE_URL . "admin-materiales");
    } else {
      $this->viewMain->showError404();
    }
  }

  /**
   * Manda a mostrar la vista de ABM de los materiales
   */
  function showSecretaryMaterials()
  {
    $materials = $this->model->getAll();
    //actualizo la vista
    $this->view->printSecretaryMaterials($materials);
  }

  /**
   * Manda a confirmar eliminacion de material
   */
  function deleteAcceptedMaterial($id)
  {
    if (isset($id)) {
      $this->authHelper->checkLoggedIn();
      $this->model->delete($id);
    }
    header('Location: ' . BASE_URL . 'admin-materiales');
  }

  /**
   * Manda a mostrar el form de actualizacion de un material
   */
  function showFormUpdateAcceptedMaterial($id){
    $this->authHelper->checkLoggedIn();    
    $material=$this->model->getMaterial($id);
    $this->view->printFormUpdateAcceptedMaterial($material);
  }

  /**
   * Manda a actualizar un material
   */
  function updateAcceptedMaterial($id){
    $this->authHelper->checkLoggedIn();

    $mat_id = $id;
    $material = $_POST['materialUpdated'];
    $deliveryMethod = $_POST['deliveryMethodUpdated'];

    if (empty($material) || empty($deliveryMethod)){
      $this->viewMain->showError404();
      die();
    }

    if($_FILES['input_name']['type'] == "image/jpg" ||
      $_FILES['input_name']['type'] == "image/jpeg" ||
      $_FILES['input_name']['type'] == "image/png"){ //si es alguno de estos formatos de imagen
        $realName= $this->uniqueSaveName(
          $_FILES['input_name']['name'], //nombre real aporta la extension del archivo
          $_FILES['input_name']['tmp_name']
        ); 
      $success= $this->model->update($material, $deliveryMethod,$mat_id, $realName);
    }
    else{
      $success= $this->model->update($material, $deliveryMethod, $mat_id);
    }
    // redirigimos al listado
    if($success){
      header('Location: ' . BASE_URL . 'admin-materiales');
    }  
    else { 
      $this->viewMain->showError404();
    }
  }

  /**
   * Manda a eliminar la imagen de un material
   */
  function deleteImage($id){
    $this->authHelper->checkLoggedIn();
    $material=$this->model->getMaterial($id);
    
    $type= $material->material;
    $deliveryMethod= $material->deliveryMethod;
    $img= $material->image;

    $this->model->deleteImg($type, $deliveryMethod, $id, $img);
    header("Location: " .BASE_URL. "admin-materiales");
  }

  /**
   * Manda a mostrar el formulario para el ingreso de reciclables
   */
  function showMaterialDeposit()
  {
    $cartoneros = $this->modelCartonero->getAll();
    $materials = $this->model->getAll();
    $this->view->showMaterialDeposit($cartoneros, $materials);
  }

  /**
   * Valida el formulario recibido, vuelve a mostrarlo indicando exito en la carga o informando el error
   */
  function checkIncomeMaterialDeposit()
  {
    $cartoneros = $this->modelCartonero->getAll();
    $materials = $this->model->getAll();

    if (
      !isset($_POST["agent"]) || !isset($_POST["id_material"]) || !is_numeric($_POST["id_material"])
      || !isset($_POST["weight"]) || !is_numeric($_POST["weight"])
    ) {
      $this->view->showMaterialDeposit($cartoneros, $materials, null, "Por favor completa todos los campos del formulario");
      die();
    }

    $agent = $_POST["agent"];
    $id_cartonero = 0; //el 0 es el ciudadano buena onda
    $id_material = $_POST["id_material"];
    $weight = $_POST["weight"];

    //si el radio button elegido es cartonero, busca el id del cartonero elegido
    if ($agent == "cartonero" && isset($_POST["id_cartonero"])) {
      $id_cartonero = $_POST["id_cartonero"];
      if ($id_cartonero == "null") {
        $this->view->showMaterialDeposit($cartoneros, $materials, null, "Por favor selecciona un cartonero del listado o elige al ciudadano buena onda");
        die();
      }
    }

    $this->modelMaterialDeposit->insert($id_cartonero, $id_material, $weight);

    $msg = "Exito al ingresar el material reciclable!";
    $this->view->showMaterialDeposit($cartoneros, $materials, $msg);
  }
}
