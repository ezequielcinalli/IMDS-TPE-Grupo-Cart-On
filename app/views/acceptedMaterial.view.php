<?php
require_once "libs/Smarty.class.php";

class AcceptedMaterialView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign("BASE_URL", BASE_URL);
  }

  /**
   * Muestra los materiales aceptados.
   */
  function showAcceptedMaterials($materials)
  {
    $this->smarty->assign("materials_s", $materials);
    $this->smarty->display("templates/acceptedMaterials.tpl");
  }

  /**
   * Muestra las condiciones de entrega del material.
   */
  function showDeliveryConditions($material)
  {
    $this->smarty->assign("material_s", $material->material);
    $this->smarty->assign("deliveryMethod_s", $material->deliveryMethod);
    $this->smarty->assign("img_s", $material->image);
    $this->smarty->display("templates/deliveryConditions.tpl");
  }

  /**
   * Muestra mensaje de error 404.
   */
  function showError404()
  {
    $this->smarty->display("templates/error404.tpl");
  }
}
