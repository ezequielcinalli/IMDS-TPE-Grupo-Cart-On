{include file="templates/navbar.tpl"}
  <div class="row justify-content-center m-5">
    {include file="templates/formAddMaterial.tpl"}
    <div class="col-8">   
        <div class="col-10">
            <h1>{$titulo_s}</h1>
        </div>
        <div class="col-10">    
        <table class="table">
            <thead>
            <tr  class="text-center" >
                <th scope="col">Tipo</th>
                <th scope="col" >Borrar</th>
                <th scope="col" >Editar</th>
            </tr>
            </thead>
            <tbody>
            {foreach from=$materials_s item=$mat}          
            <tr>
                <td>- {$mat->material}</td>           
                <td class="text-center"><a class='btn btn-danger btn-sm' href='eliminar-material/{$mat->id}'>ELIMINAR</a></td>
                <td class="text-center"> <a class='btn btn-primary btn-sm' href='editar-material/{$mat->id}'>Editar</a> </td>
            </tr>
            {/foreach}
            </tbody>
        </table>
        </div>
    </div> 
</div>  

{include file="templates/footer.tpl"}