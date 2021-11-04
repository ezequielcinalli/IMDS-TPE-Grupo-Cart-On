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
   * Muestra el formulario para ingresar materiales traidos por cartoneros/buena onda
   */
  function showMaterialDeposit($cartoneros, $materials)
  {
    $this->smarty->assign('cartoneros', $cartoneros);
    $this->smarty->assign('materials', $materials);
    $this->smarty->display('./templates/recyclableMaterialIncome.tpl');
  }
}
