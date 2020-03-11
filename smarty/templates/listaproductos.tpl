<!-- listamos todos los productos -->
{foreach from=$productos item=producto}
<p>
    <form id='{$producto->getcodigo()}' action='productos.php' method='POST'>
        <input type='hidden' name='cod' value='{$producto->getcodigo()}'/>
        <input type='submit' name='enviar' value='Añadir'/>
        
        <!-- extraemos la familia del producto para saber cuales son ordenadores-->
        {$familia = $producto->getFamilia()}
        
        <!-- si son ordenadores hay que incluir el hipervínculo -->
        {if $familia eq "ORDENA"}
            <!-- vínculo método get - visible en la dirección codigo producto-->
            <a href="{"ordenadores.php?codigo={$producto->getcodigo()}"}">
            {$producto->getnombrecorto()}: {$producto->getPVP()} euros</a>
        {else}
            <!-- si no es de la familia ordenador lo dejamos como 
            estaba incialmente en el programa-->
            {$producto->getnombrecorto()}: {$producto->getPVP()} euros
        {/if}
    </form>
</p>
{/foreach}
