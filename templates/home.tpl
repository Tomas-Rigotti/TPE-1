{include 'templates/header.tpl'}
            
<div class='row'>
    {foreach from=$libros item=$libro}
        <div class='col'> 
          <a href='detalle-libros/{$libro->id_libros}'> {$libro->titulo} </a> <br> {$libro->fecha_pub} <br> {$libro->genero} <br> {$libro->autor} <br>
          {if isset($smarty.session.USER_ID)}
            <a href='borrar-libro/{$libro->id_libros}' type='button' class='btn btn-danger'>Borrar</a>
            <a href='form-editar-libro/{$libro->id_libros}' type='button' class='btn btn-secondary'>Editar</a>
          {/if}
        </div> 
    {/foreach}
</div>



{if isset($smarty.session.USER_ID)}

  <h3 class="text-center">Agregar un libro</h3>

<form class="row g-3" action="agregar-libro" method="POST">
  <div class="col-md-6">
    <input type="text" class="form-control" name="titulo" placeholder="Titulo">
  </div>
  <div class="col-md-6">
    <input type="text" class="form-control" name="fecha_pub" placeholder="Fecha de publicacion">
  </div>
  <div class="col-md-6">
    <input type="text" class="form-control" name="genero" placeholder="Genero">
  </div>
  <div class="col-md-6">
    <input type="text" class="form-control" name="cantPaginas" placeholder="Cantidad de paginas">
  </div>
  <div class="col-md-4">
    <label for="inputAutor" class="form-label">Autor</label>
    <select id="inputAutor" name="inputAutor" class="form-select">
      <option selected value="vacio">Elegir...</option>
      
      {foreach from=$autores item=$autor}
        <option value={$autor->id_autores}>
        {$autor->nombre}
        </option>
      {/foreach}
      
    </select>
  </div>
  <div class="col-12">
    <button type="submit" class="btn btn-primary">Agregar</button>
  </div>
</form>

{/if}






        