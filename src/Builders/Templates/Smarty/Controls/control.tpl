<button type="{$controlObj->getType()}" 
    class="btn {if $controlObj->getHtmlClass() !== null}{$controlObj->getHtmlClass()}{else}btn-primary{/if}" 
    value="{$controlObj->getTitle()}" 
    title="{if $controlObj->getDescription() !== null}{$controlObj->getDescription()}{else}{$controlObj->getTitle()}{/if}">
    {if $controlObj->getIcon() !== null}
        <span class="{$controlObj->getIcon()}"></span>
        &nbsp;
    {/if}
    {$controlObj->getTitle()}
</button>