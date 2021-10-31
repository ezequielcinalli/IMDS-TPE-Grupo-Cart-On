<?php
include_once "app/models/acceptedMaterial.model.php";
include_once "app/views/auth.view.php";
include_once "app/views/main.view.php";
include_once 'app/helpers/auth.helper.php';

class AuthController{
  private $view;
  private $viewMain;
  private $authHelper;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->view = new AuthView();
    $this->viewMain = new MainView();
    $this->authHelper = new AuthHelper();
  }

  /**
   * Manda a mostrar la vista del formulario de login 
   */
  function login(){
    $this->authHelper->checkSessionIsStarted();
    $this->view->showLogin();    
  }

  /**
   * Chequea los datos del formulario recibido e inicia sesion
   */
  function checkLogin(){
    if (!empty($_POST['email']) && !empty($_POST['pass'])) {
      $user = array('email' => 'admin@admin.com', 'pass' => '123456');
      if ($user['email'] == $_POST['email'] && $user['pass'] == $_POST['pass']) {
        $this->authHelper->startSession($user['email']);
      } else {
        $this->view->showLogin("Email o Contraseña incorrectos");
      }
    } else {
      $this->view->showLogin("Faltan datos, por favor completa todos los campos.");
    }
  }

  /**
   * Desloguea al usuario destruyendo la sesion actual
   */
  function logout()
  {
    $this->authHelper->logout();
  }

}


