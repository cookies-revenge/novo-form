<section class="container novo-form-container">


    {if isset($title)}
        <div class="novo-form-title" class="mb-4">
            <h1 class="text-gray-800">
                {$title} Form
            </h1>
        </div>
    {/if}


    {* Inject form-level preceding partial(s) *}
    {if isset($preceding_partial) && null !== $preceding_partial}
        {if is_array($preceding_partial)}
            {foreach $preceding_partial as $pre_partial}
                {include file="{$pre_partial}"}
            {/foreach}
        {else}
            {include file="{$preceding_partial}"}
        {/if}
    {/if}


    <form id="{$entity}_form" 
        action="{if isset($action_uri)}{$action_uri}{else}/api/{$entity|strtolower}{if isset($record)}/{$record.Id}{/if}" 
        method="POST" 
        data-http-method="{if !empty($record)}PUT{else}POST{/if}" 
        data-form-type="{$form_type}" 
        class="novo-form js__novo-form">


        {* Check if needed to show controls also on top of the Form; May be useful for tall forms *}
        {if $show_double_controls === true}
            <div class="form-group novo-form-controls-wrapper">
                {foreach $control_definitions as $control_definition}
                    {if $control_definition.availability === "*" || 
                        (!empty($record) && $control_definition.availability === "edit") || 
                        (empty($record) && $control_definition.availability === "new")}
                        {include file="atoms_controls/control.tpl"}
                    {/if}
                {/foreach}
            </div>
        {/if}


        {* First, list all hidden inputs on the top of the Form *}
        {foreach $field_definitions as $field_definition}
            {if $field_definition.type === "hidden"}
                {if $field_definition.availability === "*" || 
                    (!empty($record) && $field_definition.availability === "edit") || 
                    (empty($record) && $field_definition.availability === "new")}
                    {include file="atoms_fields/hidden.tpl"}
                {/if}
            {/if}
        {/foreach}
        

        {foreach $field_definitions as $field_definition}

            {if $field_definition.availability === "*" || 
                (!empty($record) && $field_definition.availability === "edit") || 
                (empty($record) && $field_definition.availability === "new")}

                {if $field_definition.type === "hidden"}
                    {* Skip hidden here, already listed at the top *}
                    {continue}
                {/if}


                {* Inject field-level preceding partial(s) *}
                {if isset($field_definition.preceding_partial) && null !== $field_definition.preceding_partial}
                    {if is_array($field_definition.preceding_partial)}
                        {foreach $field_definition.preceding_partial as $pre_partial}
                            {include file="{$pre_partial}"}
                        {/foreach}
                    {else}
                        {include file="{$field_definition.preceding_partial}"}
                    {/if}
                {/if}


                <div class="form-group novo-form-field-wrapper">

                    {if !empty($field_definition.label)}
                        <label class="form-label">
                            {if !empty($field_definition.label)}{$field_definition.label}{else}&nbsp;{/if}
                            {if isset($field_definition.validation.mandatory) && $field_definition.validation.mandatory}<i>*</i>{/if}
                        </label>
                    {/if}

                    {if !empty($field_definition.description)}
                        <small class="label-description w-100">{$field_definition.description}</small>
                    {/if}

                    {assign var="input_variable" value=$field_definition}
                    {if $field_definition.type === "complex"}
                        {include file="util/complex_type.tpl"}
                    {elseif $field_definition.type === "custom"}
                        {*include file="{$field_definition.custom_partial}"*}
                    {else}
                        {include file="atoms_fields/{$field_definition.type}.tpl"}
                    {/if}
                </div>


                {* Inject field-level suceeding partial(s) *}
                {if isset($field_definition.suceeding_partial) && null !== $field_definition.suceeding_partial}
                    {if is_array($field_definition.suceeding_partial)}
                        {foreach $field_definition.suceeding_partial as $suc_partial}
                            {include file="{$suc_partial}"}
                        {/foreach}
                    {else}
                        {include file="{$field_definition.suceeding_partial}"}
                    {/if}
                {/if}

            {/if}
        
        {/foreach}


        <div class="form-group novo-form-controls-wrapper">
            {foreach $control_definitions as $control_definition}
                {if $control_definition.availability === "*" || 
                    (!empty($record) && $control_definition.availability === "edit") || 
                    (empty($record) && $control_definition.availability === "new")}
                    {include file="atoms_controls/control.tpl"}
                {/if}
            {/foreach}
        </div>

    </form>


    {* Inject form-level suceeding partial(s) *}
    {if isset($suceeding_partial) && null !== $suceeding_partial}
        {if is_array($suceeding_partial)}
            {foreach $suceeding_partial as $suc_partial}
                {include file="{$suc_partial}"}
            {/foreach}
        {else}
            {include file="{$suceeding_partial}"}
        {/if}
    {/if}

</section>