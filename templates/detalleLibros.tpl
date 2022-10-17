{include 'templates/header.tpl'}

{foreach from= $librosporID item=$libro }
    <div class='col'>
        <b>{$libro->titulo}</b> <br> Fue publicado el {$libro->fecha_pub} su genero es {$libro->genero} y tiene {$libro->cantidad_pag} paginas.
        Fue escrito por <a href='detalle-autores/{$libro->id_autor}'> {$libro->autor} </a>
    </div>
{/foreach}





    





