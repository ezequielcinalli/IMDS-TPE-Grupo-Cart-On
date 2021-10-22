"use strict";

document.addEventListener("DOMContentLoaded", scriptRegistration);

//agrega listener al formulario
function scriptRegistration() {
    let withdrawForm = document.querySelector("#formretiro");
    withdrawForm.addEventListener("submit", (e) => {
        e.preventDefault();
        formValidation();
    });

    // valida los campos del formulario antes de hacer el submit
    function formValidation() {
        let inputName = document.querySelector("#inputNombre");
        let inputSurname = document.querySelector("#inputApellido");
        let inputAddress = document.querySelector("#inputDireccion");
        let inputPhone = document.querySelector("#inputTelefono");
        let inputTimeSlot = document.querySelector("#inputFHoraria");
        let inputMaterialVol = document.querySelector("#inputVolMateriales");
        let isFormValid = true;

        if (inputName.value == null || inputName.value.length == 0) {
            inputName.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputName.className = "form-control w-100 is-valid";
        }

        if (inputSurname.value == null || inputSurname.value.length == 0) {
            inputSurname.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputSurname.className = "form-control w-100 is-valid";
        }

        if (inputAddress.value == null || inputAddress.value.length == 0) {
            inputAddress.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputAddress.className = "form-control w-100 is-valid";
        }

        if (
            inputPhone.value == null ||
            inputPhone.value.length == 0 ||
            inputPhone.value.length < 8
        ) {
            inputPhone.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputPhone.className = "form-control w-100 is-valid";
        }

        if (inputTimeSlot.value == null || inputTimeSlot.value.length == 0) {
            inputTimeSlot.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputTimeSlot.className = "form-control w-100 is-valid";
        }

        if (
            inputMaterialVol == null ||
            inputMaterialVol.value.length == 0
        ) {
            inputMaterialVol.className = "form-control w-100 is-invalid";
            isFormValid = false;
        } else {
            inputMaterialVol.className = "form-control w-100 is-valid";
        }

        if (isFormValid) {
            withdrawForm.submit();
        }
    }
}
