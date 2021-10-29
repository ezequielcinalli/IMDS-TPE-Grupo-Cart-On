<?php
include_once "app/models/acceptedMaterial.model.php";
include_once "app/views/secretary.view.php";
include_once "app/views/main.view.php";

class SecretaryController{
    private $model;
    private $view;
    private $viewMain;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->model = new AcceptedMaterialModel;
    $this->view = new SecretaryView();
    $this->viewMain = new MainView();
  }



}