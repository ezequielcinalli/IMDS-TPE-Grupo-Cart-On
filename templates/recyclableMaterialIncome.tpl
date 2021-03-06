{include file="templates/navbar.tpl"}

<div class='container'>
  <h1 class="mt-4">Ingreso de materiales reciclables</h1>
  {if $msg != null}
    <h2 class="text-success text-center mt-4">{$msg}</h2>
  {/if}
  {if $error != null}
    <h2 class="text-danger text-center mt-4">{$error}</h2>
  {/if}
  <form action="cargar-material-peso" class="form-inline mt-5" id="formRetiro" enctype="multipart/form-data"
    method='POST'>
    <h3 class="text-center">Seleccione el agente de entrega</h3>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agent" value="cartonero" id="cartonero">
      <div class="input-group mb-3">
        <span class="input-group-text">Cartonero:</span>
        <select name="id_cartonero" class="form-select" aria-label="Default select example">
          <option value="null" selected>Seleccione un cartonero de la lista...</option>
          {foreach from=$cartoneros item=$cartonero }
            {if $cartonero->id_cartonero > 0}
              <option value="{$cartonero->id_cartonero}">{$cartonero->name} {$cartonero->lastname}</option>
            {/if}
          {/foreach}
        </select>
      </div>
    </div>
    <div class="form-check">
      <input class="form-check-input" type="radio" name="agent" value="buenaonda" id="cool-citizen" checked>
      <label class="form-check-label" for="cool-citizen">
        Ciudadano "Buena Onda"
      </label>
    </div>

    <h3 class="text-center mt-4">Ingrese el peso del material</h3>
    <div class="form-group w-100">
      <div class="input-group mb-3">
        <span class="input-group-text">Material:</span>
        <select name="id_material" class="form-select" aria-label="Default select example">
          <option value="null" selected>Seleccione de la lista...</option>
          {foreach from=$materials item=$material }
            <option value="{$material->id}">{$material->material}</option>
          {/foreach}
        </select>
        <span class="input-group-text">Peso:</span>
        <input name="weight" type="text" class="form-control" placeholder="Ingrese un valor numerico..." required>
      </div>
    </div>
    <button type="submit" class="btn btn-secondary mt-4 w-100">Enviar</button>
  </form>
</div>
{include file="templates/footer.tpl"}