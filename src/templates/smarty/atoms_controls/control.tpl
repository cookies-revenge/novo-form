<button type="{$control_definition_definition.type}" 
    class="btn {if isset($control_definition.html_class)}{$control_definition.html_class}{else}btn-primary{/if}" 
    value="{$control_definition.name}" 
    title="{if isset($control_definition.description) && $control_definition.description !== null}{$control_definition.description}{else}{$control_definition.title}{/if}">
    {if isset($control_definition.icon) && $control_definition.icon !== null}
        <span class="{$control_definition.icon}"></span>
        &nbsp;
    {/if}
    {$control_definition.title}
</button>