<?php
include_once 'app/models/acceptedMaterial.model.php';
include_once 'app/views/citizen.view.php';

class AcceptedMaterialController{
    private $model;
    private $view;

    function __construct(){
        $this->model = new AcceptedMaterialModel();
        $this->view = new CitizenView();
    }

    /**
     * Manda a mostrar todos los materiales aceptados.
     */
    function showAcceptedMaterials(){
        $AcceptedMaterials= $this->model-> getAll();

        $this->view->showAcceptedMaterials($AcceptedMaterials);
    }

    /**
     * Manda a mostrar un material por id.
     */
    function showDeliveryConditions($id){
        $material= $this->model->getMaterial($id);

        if($material) {
            $this->view->showDeliveryConditions($material);
        }
        else {
            $this->view->showError404();
        }
    }

}