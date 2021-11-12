<?php
include_once "app/models/acceptedMaterial.model.php";
include_once "app/views/acceptedMaterial.view.php";
include_once "app/views/main.view.php";

class AcceptedMaterialController
{
  private $model;
  private $view;
  private $viewMain;

  function __construct()
  {
    $this->model = new AcceptedMaterialModel();
    $this->view = new AcceptedMaterialView();
    $this->viewMain = new MainView();
  }

  /**
   * Manda a mostrar todos los materiales aceptados.
   */
  function showAcceptedMaterials()
  {
    $AcceptedMaterials = $this->model->getAll();

    $this->view->showAcceptedMaterials($AcceptedMaterials);
  }

  /**
   * Manda a mostrar un material por id.
   */
  function showDeliveryConditions($params)
  {
    $id = 0;
    if (isset($params[1])) {
      $id = $params[1];
    }

    $material = $this->model->getMaterial($id);

    if ($material) {
      $this->view->showDeliveryConditions($material);
    } else {
      $this->viewMain->showError404();
    }
  }
}
