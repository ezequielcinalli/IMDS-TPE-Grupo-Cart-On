<?php
require_once "libs/Smarty.class.php";

class AuthView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign("BASE_URL", BASE_URL);
  }

  /**
   * Muestra formulario de login, recibe parametro opcional mensaje de error.
   */
  function showLogin($msg = "")
  {
    $this->smarty->assign('messageError', $msg);
    $this->smarty->display('templates/login.tpl');
  }
}
