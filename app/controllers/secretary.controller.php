<?php
include_once "app/models/acceptedMaterial.model.php";
include_once "app/views/secretary.view.php";
include_once "app/views/main.view.php";
include_once 'app/helpers/auth.helper.php';

class SecretaryController{
  private $model;
  private $view;
  private $viewMain;
  private $authHelper;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->model = new AcceptedMaterialModel;
    $this->view = new SecretaryView();
    $this->viewMain = new MainView();
    $this->authHelper = new AuthHelper();
  }

  /**
   * Construye un nombre unico de archivo y lo mueve a la carpeta de img
   */
  function uniqueSaveName($realName, $temporalName){
    $filePath = "images/" . uniqid("", true) . "."
      . strtolower(pathinfo($realName, PATHINFO_EXTENSION));

    move_uploaded_file($temporalName, $filePath); //funcion que mueve archivos

    return $filePath; 
  }

  /**
   * Agrega un nuevo material aceptado a la DB
   */
  function addAcceptedMaterial(){

    $material = $_POST['material'];
    $deliveryMethod = $_POST['deliveryMethod'];

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
      $success= $this->model->insert($material, $deliveryMethod, $realName);
    }
    else{
      $success= $this->model->insert($material, $deliveryMethod);
    }

    // redirigimos al listado
    if($success){
      header("Location: " . BASE_URL. "admin-materiales");
    }  
    else { 
      $this->viewMain->showError404();
    }
  }

  /**
   * Manda a mostrar la vista de ABM de los materiales
   */
  function showSecretaryMaterials(){ 
    $materials= $this->model-> getAll();
    //actualizo la vista
    $this->view->printSecretaryMaterials($materials);    
  }

  /**
   * Manda a confirmar eliminacion de material
   */
  function deleteAcceptedMaterial($id){
    if (isset($id)) {
      $this->authHelper->checkLoggedIn();    
      $this->model->delete($id);
    }
    header('Location: ' . BASE_URL . 'admin-materiales');
  }

  /**
   * Manda a mostrar el formulario para el ingreso de reciclables
   */
  function showMaterialDeposit(){
    echo("TODO: function");
  }
}
