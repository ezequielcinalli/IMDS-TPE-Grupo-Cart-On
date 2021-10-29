<div class="formulario col-4 mt-5">
    <h3>Agregar nuevo material</h3>
    <!-- formulario de alta -->
    <form action="insertar-material" method="POST" class="my-4" enctype="multipart/form-data">
      <div class="row">
          <div class="col-10">
              <div class="form-group">
                  <label>Tipo</label>
                  <input name="material" type="text" class="form-control">
              </div>
          </div>
          <div class="col-10">
              <div class="form-group">
                  <label>Metodo de entrega</label>
                  <input name="deliveryMethod" type="text" class="form-control">
              </div>
          </div>
          <div class="col-10">
              <div class="form-group">
                  <label for="image">Imagen</label>
                  <input type="file" name="input_name" id="imageToUpload">
              </div>
          </div>
        </div>
        <button type="submit" class="btn btn-primary mt-5">Guardar!</button>
    </form>
</div>