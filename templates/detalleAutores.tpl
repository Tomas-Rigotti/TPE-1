{include 'templates/header.tpl'}

{if count($librosPorAutor) <= 0}
    <h2>Este autor no tiene libros</h2>
    <a href="autores"> Volver </a>

    {else}
        {$librosPorAutor[0]->autor}  Escribio los siguientes libros <br>
        <ul class='list-group'>
            {foreach from=$librosPorAutor item=$libro}
                <li class='list-group-item'>
                    <b>{$libro->titulo}</b> Genero: {$libro->genero} <br> 
                    Tiene {$libro->cantidad_pag} páginas y fue publicado el {$libro->fecha_pub}
                </li>
            {/foreach}  
        </ul>  
    
{/if}


      

