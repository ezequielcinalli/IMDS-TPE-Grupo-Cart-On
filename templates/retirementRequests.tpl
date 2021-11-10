{include file='templates/navbar.tpl'}
<div class="container">
    <div class="m-3 d-flex justify-content-end">
        <form action="solicitudes-retiro-filtrada" method='POST' class="form-group">
            <input name="date1" id="date1" type="date" class="form-input">
            <input name="date2" id="date2" type="date" class="form-input">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div class="row justify-content-center m-5">    
    <div class="col-10">
      <h1>Solicitudes de retiro</h1>
    </div>
    <div class="col-10">    
      <table class="table">
        <thead>
          <tr  class="text-center" >
            <th scope="col">Nombre y apellido</th>
            <th scope="col">Dirección</th>
            <th scope="col">Telefono</th>
            <th scope="col">Horario</th>
            <th scope="col">Entra en</th>
          </tr>
        </thead>
        <tbody>
          {foreach from=$requests item=$request}          
          <tr>
            <td class="text-center">{$request->name} {$request->lastname}</td>
            <td class="text-center">{$request->address}</td>
            <td class="text-center">{$request->phone}</td>
            <td class="text-center">
                {if $request->retirement_time == "horario1"}
                    <p class="card-text">De 9hs a 12hs</p>
                {else}
                    <p class="card-text">De 13hs a 17hs</p>
                {/if}
            </td>
            <td class="text-center">{$request->volume_materials}</td> 
          </tr>
          {/foreach}
        </tbody>
      </table>
    </div>
  </div>  
</div>
{include file='templates/footer.tpl'}