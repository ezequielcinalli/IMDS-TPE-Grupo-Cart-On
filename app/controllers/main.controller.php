<?php
include_once "app/views/main.view.php";

class MainController
{
  private $view;

  /**
   * Se crea objeto de vista asociada.
   */
  function __construct()
  {
    $this->view = new MainView();
  }

  /**
   * Manda a mostrar la pagina de inicio.
   */
  function showHome()
  {
    $this->view->showHome();
  }
}
