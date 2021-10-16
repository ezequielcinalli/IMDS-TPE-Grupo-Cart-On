{include file="templates/navbar.tpl"}
<div class='container'> 
  <div class='row justify-content-center m-5'>    
    <div class='col-10'>
      <h1>Solicitud de Retiro</h1>
    </div>  
  <form class="form-inline col-10" action='addskin' method="POST" enctype="multipart/form-data">
    <div class= "form-group w-100">
      <div class="row m-3">
        <div class="col">
          <label class="mb-2">Nombre</label>
          <input class="form-control w-100" name="nombre" placeholder="Nombre" type="text"> 
        </div>
        <div class="col">
          <label class="mb-2">Apellido</label>
          <input class="form-control w-100" name="apellido" placeholder="Apellido" type="text">
        </div> 
      </div>  
      <div class="row m-3">
        <div class="col">  
          <label class="mb-2">Dirección</label>
          <input class="form-control w-100" name="direccion" placeholder="Direccion" type="text">
        </div>
        <div class="col"> 
          <label class="mb-2">Telefono</label>
          <input class="form-control w-100" name="telefono" placeholder="Telefono" type="text"> 
        </div>
      </div>
      <div class="row m-3">
        <div class="col">
          <label class="mb-2">Franja horaria</label>
          <select class="form-control w-100" name="franjahoraria">
            <option value="horario1">9hs a 12hs</option>
            <option value="horario2">13hs a 17hs</option>
          </select>
        </div>
        <div class="col">
          <label class="mb-2">Volumen de los materiales</label>
          <select class="form-control w-100" id="volmateriales" name="Volmateriales">
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
          <input class="form-control" type="file" id="subirfotos">
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
{include file="templates/footer.tpl"}
