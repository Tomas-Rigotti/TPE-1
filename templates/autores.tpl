{include 'templates/header.tpl'}


<div class='row'> 
    {foreach from=$autores item=$autor}
        
        <div class='col'> 
        <a href='detalle-autores/{$autor->id_autores}'>{$autor->nombre}</a> </b> <br> {$autor->fecha_nac} <br> {$autor->lugar_nac} <br> 
        {if isset($smarty.session.USER_ID)}
            <a href='borrar-autor/{$autor->id_autores}' type='button' class='btn btn-danger'>Borrar</a>
            <a href='form-editar-autor/{$autor->id_autores}' type='button' class='btn btn-secondary'>Editar</a> 
        {/if}
        
        </div>
    {/foreach}
</div>

{if isset($smarty.session.USER_ID)}
    {include 'agregarAutor.tpl'}
{/if}
