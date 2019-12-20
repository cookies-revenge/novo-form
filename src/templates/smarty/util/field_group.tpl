<div class="novo-field-group border border-light p-1">

    {if !empty($field_group.label)}
        <p class="novo-field-group-label {if isset($field_group.label.html_class) && !empty($field_group.label.html_class)}{$field_group.label.html_class}{/if}">
            {if !empty($field_group.label.text)}
                {$field_group.label.text}
            {/if}
        </p>
    {/if}

    {if !empty($field_group.description)}
        <p class="novo-field-group-description 
        {if isset($field_group.description.html_class) && !empty($field_group.description.html_class)}
            {$field_group.description.html_class}
        {/if}">
            {if !empty($field_group.description.text)}
                {$field_group.description.text}
            {/if}
        </p>
    {/if}
    
    {if isset($field_group.preceding_partial) && null !== $field_group.preceding_partial}
        {foreach $field_group.preceding_partial as $fgpre_partial}
            {include file="{$fgpre_partial.source}"}
        {/foreach}
    {/if}

    {foreach $field_group as $field_definition}
        {assign var="input_variable" value=$field_definition}
        {include file="fields/{$field_definition.type}.tpl"}
    {/foreach}

    {if isset($field_group.suceding_partial) && null !== $field_group.suceding_partial}
        {foreach $field_group.suceding_partial as $fgsuc_partial}
            {include file="{$fgsuc_partial.source}"}
        {/foreach}
    {/if}

</div>