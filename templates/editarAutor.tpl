{include 'templates/header.tpl'}

<h3 class="text-center">Editar autor</h3>
<form class="row g-3" action="editar-autor/{$autor->id_autores}" method="POST">
  <div class="col-md-4">
    <input type="text" class="form-control" name="nombre" value="{$autor->nombre}" required>
  </div>

  <div class="col-md-4">
    <input type="text" class="form-control" name="lugar_nac" value="{$autor->lugar_nac}" required>
  </div>

  <div class="col-md-4">
    <input type="text" class="form-control" name="fecha_nac" value="{$autor->fecha_nac}" required>
  </div>

  <div class="col-12">
    <br>
    <button type="submit" class="btn btn-primary">Editar</button>
  </div>
</form>

