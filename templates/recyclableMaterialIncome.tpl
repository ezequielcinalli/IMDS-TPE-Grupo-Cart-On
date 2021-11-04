{include file="templates/navbar.tpl"}

<div class='container'>
  <h1 class="mt-4">Ingreso de materiales reciclables</h1>
  <form action="cargar-material-peso" class="form-inline mt-5" id="formRetiro" enctype="multipart/form-data"
    method='POST'>
    <h3 class="text-center">Seleccione el agente de entrega</h3>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agent" id="cartonero">
      <div class="input-group mb-3">
        <span class="input-group-text">Cartonero:</span>
        <select class="form-select" aria-label="Default select example">
          <option value="null" selected>Seleccione un cartonero de la lista...</option>
          {foreach from=$cartoneros item=$cartonero }
            <option value="{$cartonero->id_cartonero}">{$cartonero->name}</option>
          {/foreach}
        </select>
      </div>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agent" id="cool-citizen" checked>
      <label class="form-check-label" for="cool-citizen">
        Ciudadano "Buena Onda"
      </label>
    </div>

    <h3 class="text-center mt-4">Ingrese el peso del material</h3>
    <div class="form-group w-100">
      <div class="input-group mb-3">
        <span class="input-group-text">Material:</span>
        <select name="material" class="form-select" aria-label="Default select example">
          <option value="null" selected>Seleccione de la lista...</option>
          {foreach from=$materials item=$material }
            <option value="{$material->id}">{$material->material}</option>
          {/foreach}
        </select>
        <span class="input-group-text">Peso:</span>
        <input name="weight" type="text" class="form-control" placeholder="Ingrese el peso...">
      </div>
    </div>
    <button type="submit" class="btn btn-secondary mt-4 w-100">Enviar</button>
  </form>
</div>

{include file="templates/footer.tpl"}