<?php
include_once "app/views/citizen.view.php";

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
        $this->data = file_get_contents("mocks/acceptedMaterials.json");
    }

    /**
     * Manda a mostrar la pagina de inicio.
     */
    function showHome()
    {
        $this->view->showHome();
    }

    /**
     * Manda a mostrar la pagina para registrar un pedido de retiro.
     */
    function showRegisterRetirementRequest()
    {
        $this->view->showRegisterRetirementRequest();
    }

    /**
     * Verificacion de registro de orden.
     */
    function registerRetirementRequest()
    {
        $name = $_POST["nombre"];
        $lastName = $_POST["apellido"];
        $adress = $_POST["direccion"];
        $movilNumber = $_POST["telefono"];
        $time = $_POST["franjahoraria"];
        $materialsVol = $_POST["volmateriales"];

        /**
         *  verificacion de formulario
         */
        if (
            empty($name) ||
            empty($lastName) ||
            empty($adress) ||
            empty($movilNumber) ||
            empty($time) ||
            empty($materialsVol)
        ) {
            $this->view->showRegisterRetirementRequest(
                "Faltan datos obligatorios para la orden."
            );
            die();
        }
        if (strlen((string) $movilNumber) < 8) {
            $this->view->showRegisterRetirementRequest(
                "El numero de telefono tiene que tener al menos 8 numeros."
            );
            die();
        }

        if (
            $_FILES["subirfotos"]["type"] == "image/jpg" ||
            $_FILES["subirfotos"]["type"] == "image/jpeg" ||
            $_FILES["subirfotos"]["type"] == "image/png"
        ) {
            $imageName = $this->uniqueSaveName(
                $_FILES["subirfotos"]["name"],
                $_FILES["subirfotos"]["tmp_name"]
            );
        }

        $this->view->showRegisterRetirementRequest(
            "Formulario enviado con exito!"
        );
    }

    /**
     *Guardado de imagenes
     */
    function uniqueSaveName($realName, $tempName)
    {
        $filePath =
            "images/" .
            uniqid("", true) .
            "." .
            strtolower(pathinfo($realName, PATHINFO_EXTENSION));

        move_uploaded_file($tempName, $filePath);

        return $filePath;
    }

    /**
     * Manda a mostrar error 404 si la URL llega inválida.
     */
    function showError404()
    {
        header("HTTP/1.0 404 Not Found");
        $this->view->showError404();
    }
}
