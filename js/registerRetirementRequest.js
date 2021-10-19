"use strict";

document.addEventListener("DOMContentLoaded", scriptRegistro);

//agrega listener al formulario
function scriptRegistro() {
    let formretiro = document.querySelector("#formretiro");
    formretiro.addEventListener("submit", (e) => {
        e.preventDefault();
        validarRegistro();
    });

    // valida los campos del formulario antes de hacer el submit
    function validarRegistro() {
        let inputNombre = document.querySelector("#inputNombre");
        let inputApellido = document.querySelector("#inputApellido");
        let inputDireccion = document.querySelector("#inputDireccion");
        let inputTelefono = document.querySelector("#inputTelefono");
        let inputFHoraria = document.querySelector("#inputFHoraria");
        let inputVolMateriales = document.querySelector("#inputVolMateriales");
        let validacion = true;

        if (inputNombre.value == null || inputNombre.value.length == 0) {
            inputNombre.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputNombre.className = "form-control w-100 is-valid";
        }

        if (inputApellido.value == null || inputApellido.value.length == 0) {
            inputApellido.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputApellido.className = "form-control w-100 is-valid";
        }

        if (inputDireccion.value == null || inputDireccion.value.length == 0) {
            inputDireccion.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputDireccion.className = "form-control w-100 is-valid";
        }

        if (
            inputTelefono.value == null ||
            inputTelefono.value.length == 0 ||
            inputTelefono.value.length < 8
        ) {
            inputTelefono.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputTelefono.className = "form-control w-100 is-valid";
        }

        if (inputFHoraria.value == null || inputFHoraria.value.length == 0) {
            inputFHoraria.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputFHoraria.className = "form-control w-100 is-valid";
        }

        if (
            inputVolMateriales == null ||
            inputVolMateriales.value.length == 0
        ) {
            inputVolMateriales.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputVolMateriales.className = "form-control w-100 is-valid";
        }

        if (validacion) {
            formretiro.submit();
        }
    }
}
