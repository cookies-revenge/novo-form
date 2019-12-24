<div class="form-group novo-form-field-group-wrapper border border-secondary p-3">

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
            {include file="file:{$fgpre_partial.source}"}
        {/foreach}
    {/if}

    {foreach $field_group.field_definitions as $group_field_definition}
        {assign var="input_variable" value=$group_field_definition}
        <div class="form-group w-100 novo-form-field-wrapper">

            {if !empty($group_field_definition.label)}
                <label class="form-label w-100 
                    {if isset($group_field_definition.label.html_class) && !empty($group_field_definition.label.html_class)}
                        {$group_field_definition.label.html_class}
                    {/if}">
                    {if !empty($group_field_definition.label.text)}
                        {$group_field_definition.label.text}
                        {if isset($group_field_definition.validation.mandatory) && $group_field_definition.validation.mandatory}
                            <i>*</i>
                        {/if}
                    {else}
                        &nbsp;
                    {/if}
                </label>
            {/if}

            {if !empty($group_field_definition.description)}
                <small class="label-description w-100 mt-1 mb-1 
                {if isset($group_field_definition.description.html_class) && !empty($group_field_definition.description.html_class)}
                    {$group_field_definition.description.html_class}
                {/if}">{$group_field_definition.description.text}</small>
            {/if}

            {include file="Fields/{$group_field_definition.type}.tpl"}

        </div>
    {/foreach}

    {if isset($field_group.succeeding_partial) && null !== $field_group.succeeding_partial}
        {foreach $field_group.succeeding_partial as $fgsuc_partial}
            {include file="file:{$fgsuc_partial.source}"}
        {/foreach}
    {/if}

</div>