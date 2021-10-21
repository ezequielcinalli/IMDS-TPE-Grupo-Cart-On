{include file="templates/navbar.tpl"}
<div class="container">
  <div class="row justify-content-center m-5">    
    <div class="col-10">
      <h1>Materiales reciclables aceptados</h1>
    </div>
    <div class="col-10">    
      <table class="table">
        <thead>
          <tr  class="text-center" >
            <th scope="col">Tipo</th>
            <th scope="col" >Método de entrega</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$materials_s item=$mat}          
          <tr>
            <td>- {$mat->material}</td>
            <td class="text-center"><a class="btn btn-primary btn-sm" href="condiciones-entrega/{$mat->id}"> VER DETALLES</a></td>           
          </tr>
          {/foreach}
        </tbody>
      </table>
      <p>*Esta lista esta sujeta a cambios. Por favor, controle que los tipos de materiales que trae a nuestra empresa figuren en este listado y esten en las condiciones adecuadas.</p>
    </div>
  </div>  
</div>
{include file="templates/footer.tpl"}

