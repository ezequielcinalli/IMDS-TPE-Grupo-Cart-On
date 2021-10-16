{include file="templates/navbar.tpl"}
<div class="container shadow-lg p-3 mb-0 bg-white rounded ">
  <div class="row justify-content-center">
    <div class="col text-center my-4 ">
      <h1>{$title_s}</h1>
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="col-5 text-start my-4">
      <h6 class="m-0"> Tener en cuenta a la hora de pedir un retiro que el material a entregar
            se encuentre en el estado que se especifica a continuación: </h6>
      <p class="mt-2"> {$deliveryMethod_s} </p>
    </div>
    <div class="col-4 text-start my-4 mx-3">
      <img class="img-fluid rounded" src= "{$img_s}"/>
    </div>
  </div>
  <div class="row mx-5">
    <div class="col-4 text-start my-5">
      <a class='btn btn-secondary btn-sm m-5' href='materiales-aceptados'> Volver</a>
    </div>
  </div>
</div>
{include file="templates/footer.tpl"}
