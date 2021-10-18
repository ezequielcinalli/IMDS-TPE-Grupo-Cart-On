<?php
include_once 'app/views/citizen.view.php';

class CitizenController
{
    private $view;
    private $data;

    /**
     * Se crea objeto de vista asociada.
     */
    function __construct()
    {
        $this->view = new CitizenView();
        $this->data = file_get_contents('mocks/acceptedMaterials.json');
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
    function showDeliveryConditions($id)
    {
        $json = json_decode($this->data, true);
        if ($json[$id]) {
            $deliveryMethod = $json[$id]['deliveryMethod'];
            $material = $json[$id]['material'];
            if ($id == 0) {
                $image = 'images/carton.jpg';
            }
            if ($id == 1) {
                $image = 'images/aluminio.jpg';
            }
            if ($id == 2) {
                $image = 'images/plastico.jpg';
            }
            $this->view->showDeliveryConditions(
                $deliveryMethod,
                $material,
                $image
            );
        } else {
            $this->view->showError404();
        }
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
        header('HTTP/1.0 404 Not Found');
        $this->view->showError404();
    }
}
