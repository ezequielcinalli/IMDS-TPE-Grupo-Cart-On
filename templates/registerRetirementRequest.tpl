{include file="templates/navbar.tpl"}
<div class='container'> 
  <div class='row justify-content-center m-5'>  
    {if $msj == null}  
      <div class='col-10 text-center'>
        <h1>Solicitud de Retiro</h1>
        <p>Llene el formulario para solicitar el retiro de sus materiales.
        Por favor lea atentamente nuestra sección de materiales aceptados antes de solicitar un retiro.</p>
      </div>
    {elseif $msj === 'Formulario enviado con exito!' }
      <div class='col-10 text-center'>
        <h1 class='text-success'>{$msj}</h1>
      </div> 
    {else}
      <div class='col-10 text-center'>
        <h3 class='text-danger'>{$msj}</h3>
      </div>
    {/if}
    <form action="enviar-orden" class="form-inline col-10" id="formRetiro" enctype="multipart/form-data" method='POST'>
      <div class= "form-group w-100">
        <div class="row m-3">
          <div class="col">
            <label class="mb-2">Nombre</label>
            <input class="form-control w-100" id="inputNombre" name="nombre" placeholder="Nombre" type="text">
            <div id="invalidNombre"class="invalid-feedback">El nombre es obligatorio</div> 
          </div>
          <div class="col">
            <label class="mb-2">Apellido</label>
            <input class="form-control w-100" id="inputApellido" name="apellido" placeholder="Apellido" type="text" >
            <div id="invalidApellido"class="invalid-feedback">El Apellido es obligatorio</div>
          </div> 
        </div>  
        <div class="row m-3">
          <div class="col">  
            <label class="mb-2">Dirección</label>
            <input class="form-control w-100" id="inputDireccion" name="direccion" placeholder="Direccion" type="text" >
            <div id="invalidDireccion"class="invalid-feedback">La dirección es obligatoria</div>
          </div>
          <div class="col"> 
            <label class="mb-2">Telefono</label>
            <small>Minimo 8 numeros</small>
            <input class="form-control w-100" id="inputTelefono" name="telefono" placeholder="Telefono" type="number" > 
            <div id="invalidTelefono"class="invalid-feedback">El telefono es obligatorio</div>
          </div>
        </div>
        <div class="row m-3">
          <div class="col">
            <label class="mb-2">Franja horaria</label>
            <select class="form-control w-100" id="inputFHoraria" name="franjahoraria" >
            <div id="invalidFHoraria"class="invalid-feedback">Por favor elija una franja horaria</div>
              <option value="horario1">9hs a 12hs</option>
              <option value="horario2">13hs a 17hs</option>
            </select>
          </div>
          <div class="col">
            <label class="mb-2">Volumen de los materiales</label>
            <select class="form-control w-100" id="inputVolMateriales" name="volmateriales" >
            <div id="invalidVolMateriales"class="invalid-feedback"></div>
              <option value="caja">Entra en una caja</option>
              <option value="baulauto">Entra en el baúl de un auto</option>
              <option value="cajacamioneta">Entra en la caja de una Camioneta</option>
              <option value="camion">Entra en un Camión</option>
            </select>
          </div>
        </div>
        <div class='row m-3 mb-4'>  
          <div class="col">               
            <label for="suirfotos" class="form-label mb-2">Foto de materiales <small class="text-muted">(Opcional)</small></label>
            <input class="form-control" type="file" id="subirFotos" name="subirfotos">
          </div>
        </div>
        <div class='row m-3 mt-5'>
          <div class="col">
            <button class="btn btn-lg btn-dark w-100" type='submit'>Solicitar Retiro</button>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
<script type="text/javascript" src="js/registerRetirementRequest.js"></script>
{include file="templates/footer.tpl"}
