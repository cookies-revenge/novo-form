<section class="container novo-form-container">


    {if isset($title) && null !== $title}
        <div class="novo-form-title">
            <{$title.type} class="text-gray-800 {$title.type}
            {if isset($title.html_class) && !empty($title.html_class)}
                {$title.html_class}
            {/if}">
                {$title.text}
            </{$title.type}>
        </div>
    {/if}


    {* Inject form-level preceding partial(s) *}
    {if isset($preceding_partial) && null !== $preceding_partial}
        {foreach $preceding_partial as $pre_partial}
            {include file="file:{$pre_partial.source}"}
        {/foreach}
    {/if}


    <form id="{$entity}_form" 
        action="{if isset($action_uri)}{$action_uri}{else}/api/{$entity|strtolower}{if isset($record)}/{$record.Id}{/if}{/if}" 
        method="POST" 
        enctype="multipart/form-data" 
        data-http-method="{if !empty($record)}PUT{else}POST{/if}" 
        data-form-type="{$form_type}" 
        class="novo-form js__novo-form">


        {* Check if needed to show controls also on top of the Form; May be useful for tall forms *}
        {if $display_double_controls}
            <div class="form-group w-100 novo-form-controls-wrapper border border-secondary p-2">
                {foreach $control_definitions as $control_definition}
                    {if !isset($control_definition.availability) ||
                        $control_definition.availability === "*" || 
                        (!empty($record) && $control_definition.availability === "edit") || 
                        (empty($record) && $control_definition.availability === "new")}
                        {include file="Controls/control.tpl"}
                    {/if}
                {/foreach}
            </div>
        {/if}


        {* First, list all hidden inputs on the top of the Form *}
        {foreach $field_definitions as $field_definition}
            {if $field_definition.type === "hidden"}
                {if !isset($field_definition.availability) ||
                    $field_definition.availability === "*" || 
                    (!empty($record) && $field_definition.availability === "edit") || 
                    (empty($record) && $field_definition.availability === "new")}
                    {include file="Fields/hidden.tpl"}
                {/if}
            {/if}
        {/foreach}
        

        {assign var=field_index value=0}
        {foreach $field_definitions as $field_definition}

            {if !isset($field_definition.availability) ||
                $field_definition.availability === "*" || 
                (!empty($record) && $field_definition.availability === "edit") || 
                (empty($record) && $field_definition.availability === "new")}

                {if $field_definition.type === "hidden"}
                    {* Skip hidden here, already listed at the top *}
                    {continue}
                {/if}

                {if $field_definition.type === "fieldgroup"}
                    {assign var="field_group" value=$field_definition}
                    {include file="Util/field_group.tpl"}
                    {* 
                     * util/field_group.tpl has it's own includes for partials, labels, descriptions... 
                     * so skip the code below after including it 
                    *}
                    {continue}
                {/if}


                <div class="form-group w-100 novo-form-field-wrapper">


                    {* Inject field-level preceding partial(s) *}
                    {if isset($field_definition.preceding_partial) && null !== $field_definition.preceding_partial}
                        {foreach $field_definition.preceding_partial as $pre_partial}
                            {include file="file:{$pre_partial.source}"}
                        {/foreach}
                    {/if}


                    {if !empty($field_definition.label)}
                        <label class="form-label w-100 
                            {if isset($field_definition.label.html_class) && !empty($field_definition.label.html_class)}
                                {$field_definition.label.html_class}
                            {/if}">
                            {if !empty($field_definition.label.text)}
                                {$field_definition.label.text}
                                {if isset($field_definition.validation.mandatory) && $field_definition.validation.mandatory}
                                    <i>*</i>
                                {/if}
                            {else}
                                &nbsp;
                            {/if}
                        </label>
                    {/if}

                    {if !empty($field_definition.description)}
                        <small class="label-description w-100 mt-1 mb-1 
                        {if isset($field_definition.description.html_class) && !empty($field_definition.description.html_class)}
                            {$field_definition.description.html_class}
                        {/if}">{$field_definition.description.text}</small>
                    {/if}

                    
                    {if $field_definition.type === "complex"}
                        {include file="util/complex_type.tpl"}
                    {elseif $field_definition.type === "custom"}
                        {*include file="{$field_definition.custom_partial}"*}
                    {else}
                        {assign var="input_variable" value=$field_definition}
                        {include file="Fields/{$field_definition.type}.tpl"}
                    {/if}


                    {* Inject field-level succeeding partial(s) *}
                    {if isset($field_definition.succeeding_partial) && null !== $field_definition.succeeding_partial}
                        {foreach $field_definition.succeeding_partial as $suc_partial}
                            {include file="file:{$suc_partial.source}"}
                        {/foreach}
                    {/if}
                </div>


            {/if}
        
            {* Increment field index; it is important as it is used to make validation identifiers unique *}
            {$field_index = $field_index + 1}
        {/foreach}


        <div class="form-group w-100 novo-form-controls-wrapper border border-secondary p-2">
            {foreach $control_definitions as $control_definition}
                {if !isset($control_definition.availability) ||
                    $control_definition.availability === "*" || 
                    (!empty($record) && $control_definition.availability === "edit") || 
                    (empty($record) && $control_definition.availability === "new")}
                    {include file="Controls/control.tpl"}
                {/if}
            {/foreach}
        </div>

    </form>


    {* Inject form-level succeeding partial(s) *}
    {if isset($succeeding_partial) && null !== $succeeding_partial}
        {foreach $succeeding_partial as $suc_partial}
            {include file="file:{$suc_partial.source}"}
        {/foreach}
    {/if}

</section>