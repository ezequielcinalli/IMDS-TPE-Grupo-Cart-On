{include file='templates/navbar.tpl'}
    <div class="container m-3 d-flex justify-content-end">
        <form action="solicitudes-retiro-filtrada" method='POST' class="form-group">
            <input name="date1" id="date1" type="date" class="form-input">
            <input name="date2" id="date2" type="date" class="form-input">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </form>
    </div>
    <div class="container justify-content justify-content-center row align-items-center mt-3">
          {foreach from=$requests item=$request}
            {if $request->completed == 0}
                <div class="card m-3" style="width: 18rem;">
                {if $request->image !=null}
                <img class="card-img-top" src="./images/{$request->image}" alt="Card image cap">
                {/if}
                    <div class="card-body">
                        <h5 class="card-title">{$request->name} {$request->lastname}</h5>
                        <p class="card-text">{$request->address}</p>
                        <p class="card-text">{$request->phone}</p>
                        {if $request->retirement_time == "horario1"}
                        <p class="card-text">De 9hs a 12hs</p>
                        {else}
                        <p class="card-text">De 13hs a 17hs</p>
                        {/if}
                        <p class="card-text">Entra en {$request->volume_materials}</p>
                    </div>
                </div>
            {/if}
          {/foreach}
    </div>
{include file='templates/footer.tpl'}