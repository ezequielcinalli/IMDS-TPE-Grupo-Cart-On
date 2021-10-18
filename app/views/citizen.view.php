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
    function showAcceptedMaterials()
    {
        $this->smarty->display('templates/acceptedMaterials.tpl');
    }

    /**
     * Muestra las condiciones de entrega del material.
     */
    function showDeliveryConditions($method, $material, $img)
    {
        $this->smarty->assign(
            'title_s',
            "Condiciones de entrega del {$material}"
        );
        $this->smarty->assign('deliveryMethod_s', $method);
        $this->smarty->assign('material_s', $material);
        $this->smarty->assign('img_s', $img);
        $this->smarty->display('templates/deliveryConditions.tpl');
    }

    /**
     * Permite registrar una orden para retirar materiales.
     */
    function registerRetirementRequest($error = null)
    {
        $this->smarty->assign('error', $error);
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
