'use strict'

document.addEventListener('DOMContentLoaded', scriptregistro)
function scriptregistro() {
  let formretiro = document.querySelector('#formretiro')
  formretiro.addEventListener('submit', (e) => {
    e.preventDefault()
    validarregistro()
  })

  function validarregistro() {
    let inputnombre = document.querySelector('#inputNombre')
    let inputapellido = document.querySelector('#inputApellido')
    let inputdireccion = document.querySelector('#inputDireccion')
    let inputtelefono = document.querySelector('#inputTelefono')
    let inputfhoraria = document.querySelector('#inputFHoraria')
    let inputvolmateriales = document.querySelector('#inputVolMateriales')

    if (inputnombre.value == null || inputnombre.value.length == 0) {
      console.log('hola mundo')
      inputnombre.className = 'form-control w-100 is-invalid'
    } else {
      inputnombre.className = 'form-control w-100 is-valid'
    }

    if (inputapellido.value == null || inputapellido.value.length == 0) {
      inputapellido.className = 'form-control w-100 is-invalid'
    } else {
      inputapellido.className = 'form-control w-100 is-valid'
    }

    if (inputdireccion.value == null || inputdireccion.value.length == 0) {
      inputdireccion.className = 'form-control w-100 is-invalid'
    } else {
      inputdireccion.className = 'form-control w-100 is-valid'
    }

    if (inputtelefono.value == null || inputtelefono.value.length == 0) {
      inputtelefono.className = 'form-control w-100 is-invalid'
    } else {
      inputtelefono.className = 'form-control w-100 is-valid'
    }

    if (inputfhoraria.value == null || inputfhoraria.value.length == 0) {
      inputfhoraria.className = 'form-control w-100 is-invalid'
    } else {
      inputfhoraria.className = 'form-control w-100 is-valid'
    }

    if (inputvolmateriales == null || inputvolmateriales.value.length == 0) {
      inputvolmateriales.className = 'form-control w-100 is-invalid'
    } else {
      inputvolmateriales.className = 'form-control w-100 is-valid'
    }
  }
}
