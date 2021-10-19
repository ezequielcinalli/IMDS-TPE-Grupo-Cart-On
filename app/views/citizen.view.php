<?php
require_once 'libs/Smarty.class.php';

class CitizenView
{
  private $smarty;

  function __construct()
  {
      $this->smarty = new Smarty();
      $this->smarty->assign('BASE_URL', BASE_URL);
  }

  /**
   * Muestra la pagina de inicio.
   */
  function showHome()
  {
      $this->smarty->display('templates/home.tpl');
  }

  /**
   * Muestra los materiales aceptados.
   */
  function showAcceptedMaterials($materials)
  {
    $this->smarty->assign("materials_a", $materials);
    $this->smarty->display("templates/acceptedMaterials.tpl");
  }

  /**
   * Muestra las condiciones de entrega del material.
   */
  function showDeliveryConditions($method, $material, $img)
  {
    $this->smarty->assign('material_s',$material);
    $this->smarty->assign('deliveryMethod_s',$method);    
    $this->smarty->assign('img_s',$img);
    $this->smarty->display("templates/deliveryConditions.tpl");
  }

  /**
   * Muestra el formulario de registro para crear una orden de retiraro de materiales.
   */
  function showRegisterRetirementRequest($msj = null)
  {   
      $this->smarty->assign('msj', $msj);
      $this->smarty->display('templates/registerRetirementRequest.tpl');
  }

  /**
   * Muestra mensaje de error 404.
   */
  function showError404()
  {
      $this->smarty->display('templates/error404.tpl');
  }
}
