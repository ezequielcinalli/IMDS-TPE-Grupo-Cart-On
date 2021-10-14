<?php
include_once "app/views/citizen.view.php";

class CitizenController
{
  private $view;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->view = new CitizenView();
  }

  /**
   * Manda a mostrar la pagina de inicio.
   */
  function showHome()
  {
    $this->view->showHome();
  }

  /**
   * Manda a mostrar el listado de materiales aceptados.
   */
  function showAcceptedMaterials()
  {
    $this->view->showAcceptedMaterials();
  }

  /**
   * Manda a mostrar la pagina para visualizar las condiciones de un material en particular.
   */
  function showDeliveryConditions()
  {
    $this->view->showDeliveryConditions();
  }

  /**
   * Manda a mostrar la pagina para registrar un pedido de retiro.
   */
  function registerRetirementRequest()
  {
    $this->view->registerRetirementRequest();
  }

  /**
   * Manda a mostrar error 404 si la URL llega inválida.
   */
  function showError404()
  {
    header("HTTP/1.0 404 Not Found");
    $this->view->showError404();
  }
}
