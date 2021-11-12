<?php
require_once "libs/Smarty.class.php";

class SecretaryView
{
  private $smarty;

  function __construct()
  {
    $this->smarty = new Smarty();
    $this->smarty->assign("BASE_URL", BASE_URL);
  }

  /**
   * Muestra el listado de materiales reciclables, permitiendo realizar el ABM sobre los mismos.
   */
  function printSecretaryMaterials($materials)
  {
    $this->smarty->assign('titulo_s', "ABM Materiales reciclables aceptados");
    $this->smarty->assign('materials_s', $materials);
    $this->smarty->display('./templates/adminMaterials.tpl');
  }

  /**
   * Muestra el formulario de modificacion de un material reciclable.
   */
  function printFormUpdateAcceptedMaterial($material)
  {
    $this->smarty->assign("deliveryMethod_s", $material->deliveryMethod);
    $this->smarty->assign("img_s", $material->image);
    $this->smarty->assign('material_s', $material);
    $this->smarty->display('./templates/formUpdateMaterial.tpl');
  }

  /**
   * Muestra el formulario para ingresar materiales traidos por cartoneros/buena onda
   */
  function showMaterialDeposit($cartoneros, $materials, $msg = null, $error = null)
  {
    $this->smarty->assign('cartoneros', $cartoneros);
    $this->smarty->assign('materials', $materials);
    $this->smarty->assign('msg', $msg);
    $this->smarty->assign('error', $error);
    $this->smarty->display('./templates/recyclableMaterialIncome.tpl');
  }

  /**
   * Muestra la lista de las solicitudes de retiro
   */
  function printRetirementRequests($requests)
  {
    $this->smarty->assign('requests', $requests);
    $this->smarty->display('./templates/retirementRequests.tpl');
  }
}
