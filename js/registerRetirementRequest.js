"use strict";

document.addEventListener("DOMContentLoaded", scriptregistro);

//agrega listener al formulario
function scriptregistro() {
    let formretiro = document.querySelector("#formretiro");
    formretiro.addEventListener("submit", (e) => {
        e.preventDefault();
        validarregistro();
    });

    // valida los campos del formulario antes de hacer el submit
    function validarregistro() {
        let inputnombre = document.querySelector("#inputNombre");
        let inputapellido = document.querySelector("#inputApellido");
        let inputdireccion = document.querySelector("#inputDireccion");
        let inputtelefono = document.querySelector("#inputTelefono");
        let inputfhoraria = document.querySelector("#inputFHoraria");
        let inputvolmateriales = document.querySelector("#inputVolMateriales");
        let validacion = true;

        if (inputnombre.value == null || inputnombre.value.length == 0) {
            inputnombre.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputnombre.className = "form-control w-100 is-valid";
        }

        if (inputapellido.value == null || inputapellido.value.length == 0) {
            inputapellido.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputapellido.className = "form-control w-100 is-valid";
        }

        if (inputdireccion.value == null || inputdireccion.value.length == 0) {
            inputdireccion.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputdireccion.className = "form-control w-100 is-valid";
        }

        if (
            inputtelefono.value == null ||
            inputtelefono.value.length == 0 ||
            inputtelefono.value.length < 8
        ) {
            inputtelefono.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputtelefono.className = "form-control w-100 is-valid";
        }

        if (inputfhoraria.value == null || inputfhoraria.value.length == 0) {
            inputfhoraria.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputfhoraria.className = "form-control w-100 is-valid";
        }

        if (
            inputvolmateriales == null ||
            inputvolmateriales.value.length == 0
        ) {
            inputvolmateriales.className = "form-control w-100 is-invalid";
            validacion = false;
        } else {
            inputvolmateriales.className = "form-control w-100 is-valid";
        }

        if (validacion) {
            formretiro.submit();
        }
    }
}
