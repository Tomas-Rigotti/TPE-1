<h3 class="text-center">Agregar autor</h3>
<form class="row g-3" action="agregar-autor" method="POST">
  <div class="col-md-4">
    <input type="text" class="form-control" name="nombre" placeholder="Nombre" required>
  </div>
  <div class="col-md-4">
    <input type="text" class="form-control" name="lugar_nac" placeholder="Lugar de nacimiento" required>
  </div>
  <div class="col-md-4">
    <input type="text" class="form-control" name="fecha_nac" placeholder="Fecha de nacimiento" required>
  </div>
  <div class="col-12">
  <br>
    <button type="submit" class="btn btn-primary">Agregar</button>
  </div>
</form>

