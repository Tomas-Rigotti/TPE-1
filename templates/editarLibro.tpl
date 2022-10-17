{include 'templates/header.tpl'}



<h3 class="text-center">Editar libro</h3>
<form class="row g-3" action="editar-libro/{$libros->id_libros}" method="POST">
  <div class="col-md-3">
    <input type="text" class="form-control" name="titulo" value="{$libros->titulo}" required>
  </div>

  <div class="col-md-3">
    <input type="text" class="form-control" name="fecha_pub" value="{$libros->fecha_pub}" required>
  </div>

  <div class="col-md-3">
    <input type="text" class="form-control" name="genero" value="{$libros->genero}" required>
  </div>

  <div class="col-md-3">
    <input type="text" class="form-control" name="cantidad_pag" value="{$libros->cantidad_pag}" required>
  </div>
<div class="col-md-3">
<select id="inputAutor" name="inputAutor" class="form-select">
<option selected value="vacio">Elegir autor</option>
{foreach from=$autores item=$autor}
    <option value="{$autor->id_autores}">
    {$autor->nombre}
    </option>
  {/foreach}
</select>
    
</div>

  <div class="col-12">
    <br>
    <button type="submit" class="btn btn-primary">Editar</button>
  </div>
</form>


