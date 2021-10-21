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
   * Muestra el formulario de registro para crear una orden de retiraro de materiales.
   */
  function showRegisterRetirementRequest($msj = null)
  {
    $this->smarty->assign("msj", $msj);
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
