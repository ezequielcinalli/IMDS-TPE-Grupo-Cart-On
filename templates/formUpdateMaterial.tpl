{include 'navbar.tpl'}
<div class="row justify-content-center m-5 mr-2"> 
  <h1>Editar: {$material_s->material} </h1>
  <div class="row">
    <div class="col-8 ml-0">
      <form action="actualizar-material/{$material_s->id}" method="POST" class="my-4" enctype="multipart/form-data">
        <div class="row">
          <div class="col-10 m-2">
            <div class="form-group">
              <label>Tipo</label>
              <input name="materialUpdated" type="text" class="form-control" value="{$material_s->material}">
            </div>
          </div>
          <div class="col-10 m-2">
            <div class="form-group">
              <label>Metodo de entrega</label>
              <input name="deliveryMethodUpdated" type="text" class="form-control" value="{$material_s->deliveryMethod}">
            </div>
          </div>
          <div class="col-10 m-2">
            <div class="form-group">
              <label for="image">Imagen</label>
              <input type="file" name="input_name" id="imageToUpload">
            </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Actualizar</button>
      </form>
    </div>
    {if $img_s}
      <div class="col-4 text-center h-auto ">
        <img src="{$img_s}" class="rounded float-left img-fluid d-block w-100 shadow" alt="Responsive image">
        <a class='btn btn-danger btn-sm shadow mt-3' href='eliminar-img-material/{$material_s->id}'>ELIMINAR Imagen</a>
        </div>
      </div>
      {else}
        <div class="row">
          <p class="fst-italic"> *{$material_s->material} no tiene imagen. </p>
        </div>
    {/if} 
  </div>
</div>
{include 'footer.tpl'}