<?php
require_once "libs/Smarty.class.php";

class CitizenView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign("BASE_URL", BASE_URL);
  }

  /**
   * Muestra la pagina de inicio.
   */
  function showHome()
  {
    $this->smarty->display("templates/home.tpl");
  }

  /**
   * Muestra los materiales aceptados.
   */
  function showAcceptedMaterials()
  {
    $this->smarty->display("templates/acceptedMaterials.tpl");
  }

  /**
   * Muestra las condiciones de entrega del material.
   */
  function showDeliveryConditions()
  {
    $this->smarty->display("templates/deliveryConditions.tpl");
  }

  /**
   * Permite registrar una orden para retirar materiales.
   */
  function registerRetirementRequest()
  {
    $this->smarty->display("templates/registerRetirementRequest.tpl");
  }

  /**
   * Muestra mensaje de error 404.
   */
  function showError404()
  {
    $this->smarty->display("templates/error404.tpl");
  }
}
