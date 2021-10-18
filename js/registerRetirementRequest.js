'use strict'

document.addEventListener('DOMContentLoaded', scriptregistro)
function scriptregistro() {
  let formretiro = document.querySelector('#formretiro')
  formretiro.addEventListener('submit', (e) => {
    //e.preventDefault()
    validarregistro()
  })

  function validarregistro() {
    let inputnombre = document.querySelector('#inputNombre')
    let inputapellido = document.querySelector('#inputApellido')
    let inputdireccion = document.querySelector('#inputDireccion')
    let inputtelefono = document.querySelector('#inputTelefono')
    let inputfhoraria = document.querySelector('#inputFHoraria')
    let inputvolmateriales = document.querySelector('#inputVolMateriales')

    if (inputnombre == null || inputnombre.length == 0) {
      inputnombre.setAttribute('class', 'form-control w-100 is-invalid')
      /*document.querySelector('#invalidNombre').innerHTML =
        'Por favor ingrese un nombre'*/
    }

    if (inputapellido == null) {
      inputapellido.className = 'form-control w-100 is-invalid'
      document.querySelector('#invalidApellido').innerHTML =
        'Por favor ingrese un apellido'
    }

    if (inputdireccion == null) {
      inputdireccion.className = 'form-control w-100 is-invalid'
      document.querySelector('#invalidNombre').innerHTML =
        'Por favor ingrese una dirección'
    }

    if (inputtelefono == null) {
      inputtelefono.className = 'form-control w-100 is-invalid'
      document.querySelector('#invalidNombre').innerHTML =
        'Por favor ingrese un telefono'
    }

    if (inputfhoraria == null) {
      inputfhoraria.className = 'form-control w-100 is-invalid'
      document.querySelector('#invalidNombre').innerHTML =
        'Por favor elija una franja horaria'
    }

    if (inputvolmateriales == null) {
      inputvolmateriales.className = 'form-control w-100 is-invalid'
      document.querySelector('#invalidNombre').innerHTML =
        'Por favor elija el volumen de los materiales'
    }
  }
}
