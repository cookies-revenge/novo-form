<section class="container novo-form-container">

    {include file="Partials/form_title.tpl"}


    {* Inject form-level preceding partial(s) *}
    {assign var="partials" value=$formObj->getPrecedingPartials()}
    {include file="Partials/partial.tpl"}


    <form id="{$formObj->getEntity()}_form" 
        action="{if $formObj->getActionUri() !== null}{$formObj->getActionUri()}{else}/api/{$formObj->getEntity()|strtolower}{if isset($record)}/{$record.Id}{/if}{/if}" 
        method="POST" 
        enctype="multipart/form-data" 
        data-http-method="{if !empty($record)}PUT{else}POST{/if}" 
        data-form-type="{$formObj->getFormType()}" 
        class="novo-form js__novo-form">


        {* Check if needed to show controls also on top of the Form; May be useful for tall forms *}
        {if $formObj->getDisplayDoubleControls() === true}
            {include file="Partials/form_controls.tpl"}
        {/if}

        {assign var="fieldIndex" value=0}
        {* First, list all hidden inputs on the top of the Form *}
        {foreach $formObj->GetFieldsByType("hidden") as $fieldObj}
            {if $fieldObj->getAvailability() === "*" || 
                (!empty($record) && $fieldObj->getAvailability() === "edit") || 
                (empty($record) && $fieldObj->getAvailability() === "new")}
                {include file="Fields/hidden.tpl"}
                {* Increment field index; it is important as it is used to make validation identifiers unique *}
                {$fieldIndex = $fieldIndex + 1}
            {/if}
        {/foreach}
        

        {foreach $formObj->getFieldObjects() as $fieldObj}

            {if $fieldObj->getAvailability() === "*" || 
                (!empty($record) && $fieldObj->getAvailability() === "edit") || 
                (empty($record) && $fieldObj->getAvailability() === "new")}

                {if $fieldObj->getType() === "hidden"}
                    {* Skip hidden here, already listed at the top *}
                    {continue}
                {/if}

                {if $fieldObj->getType() === "fieldgroup"}
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
                    {assign var="partials" value=$fieldObj->getPrecedingPartials()}
                    {include file="Partials/partial.tpl"}

                    {include file="Partials/field_label.tpl"}
                    {include file="Partials/field_description.tpl"}

                    {include file="{$fieldObj->GetTemplate()}"}

                    
                    
                    {*if $field_definition.type === "complex"}
                        {include file="util/complex_type.tpl"}
                    {elseif $field_definition.type === "custom"}
                    {else}
                        {assign var="input_variable" value=$field_definition}
                        {include file="Fields/{$field_definition.type}.tpl"}
                    {/if*}


                    {* Inject field-level succeeding partial(s) *}
                    {assign var="partials" value=$fieldObj->getSucceedingPartials()}
                    {include file="Partials/partial.tpl"}
                </div>


            {/if}
        
            {* Increment field index; it is important as it is used to make validation identifiers unique *}
            {$fieldIndex = $fieldIndex + 1}
        {/foreach}


        {include file="Partials/form_controls.tpl"}

    </form>


    {* Inject form-level succeeding partial(s) *}
    {assign var="partials" value=$formObj->getSucceedingPartials()}
    {include file="Partials/partial.tpl"}

</section>