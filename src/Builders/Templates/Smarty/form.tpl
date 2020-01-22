<section class="container novo-form-container">

    {include file="file:Partials/form_title.tpl"}


    {* Inject form-level preceding partial(s) *}
    {assign var="partials" value=$formObj->GetPrecedingPartials()}
    {include file="file:Partials/partial.tpl"}


    <form id="{$formObj->GetEntity()}_form" 
        action="{if $formObj->GetActionUri() !== null}{$formObj->GetActionUri()}{else}/api/{$formObj->GetEntity()|strtolower}{if isset($record)}/{$record.Id}{/if}{/if}" 
        method="POST" 
        enctype="multipart/form-data" 
        data-http-method="{if !empty($record)}PUT{else}POST{/if}" 
        data-form-type="{$formObj->GetFormType()}" 
        class="novo-form js__novo-form">

        <input type="hidden" name="novo-form-identifier" value="{$formObj->GetGuid()}" />
        {if !empty($record)}
            <input type="hidden" name="{$formObj->GetIdColumnName()}" value="{$record[$formObj->GetIdColumnName()]}" />
        {/if}

        {* Check if needed to show controls also on top of the Form; May be useful for tall forms *}
        {if $formObj->GetDisplayDoubleControls() === true}
            {include file="file:Partials/form_controls.tpl"}
        {/if}

        {assign var="fieldIndex" value=0}
        {* First, list all hidden inputs on the top of the Form *}
        {foreach $formObj->GetFieldsByType("hidden") as $fieldObj}
            {if $fieldObj->GetAvailability() === "*" || 
                (!empty($record) && $fieldObj->GetAvailability() === "edit") || 
                (empty($record) && $fieldObj->GetAvailability() === "new")}
                {include file="file:Fields/hidden.tpl"}
                {* Increment field index; it is important as it is used to make validation identifiers unique *}
                {$fieldIndex = $fieldIndex + 1}
            {/if}
        {/foreach}
        

        {foreach $formObj->GetFieldObjects() as $fieldObj}

            {if $fieldObj->GetAvailability() === "*" || 
                (!empty($record) && $fieldObj->GetAvailability() === "edit") || 
                (empty($record) && $fieldObj->GetAvailability() === "new")}

                {if $fieldObj->GetType() === "hidden"}
                    {* Skip hidden here, already listed at the top *}
                    {continue}
                {/if}

                {if $fieldObj->GetType() === "fieldgroup"}
                    {include file="file:{$fieldObj->GetTemplate()}"}
                    {* 
                     * util/field_group.tpl has it's own includes for partials, labels, descriptions... 
                     * so skip the code below after including it 
                    *}
                    {continue}
                {/if}

                {if $fieldObj->GetType() === "relation"}
                    {include file="file:{$fieldObj->GetTemplate()}"}
                    {* 
                     * util/relation.tpl has it's own includes for partials, labels, descriptions... 
                     * so skip the code below after including it 
                    *}
                    {continue}
                {/if}


                <div class="form-group w-100 novo-form-field-wrapper">


                    {* Inject field-level preceding partial(s) *}
                    {assign var="partials" value=$fieldObj->GetPrecedingPartials()}
                    {include file="file:Partials/partial.tpl"}

                    {include file="file:Partials/field_label.tpl"}
                    {include file="file:Partials/field_description.tpl"}

                    {include file="file:{$fieldObj->GetTemplate()}"}

                    
                    
                    {*if $fieldObj->GetType() === "complex"}
                        {include file="util/complex_type.tpl"}
                    {elseif $fieldObj->GetType() === "custom"}
                    {/if*}


                    {* Inject field-level succeeding partial(s) *}
                    {assign var="partials" value=$fieldObj->GetSucceedingPartials()}
                    {include file="file:Partials/partial.tpl"}
                </div>


            {/if}
        
            {* Increment field index; it is important as it is used to make validation identifiers unique *}
            {$fieldIndex = $fieldIndex + 1}
        {/foreach}


        {include file="file:Partials/form_controls.tpl"}

    </form>


    {* Inject form-level succeeding partial(s) *}
    {assign var="partials" value=$formObj->GetSucceedingPartials()}
    {include file="file:Partials/partial.tpl"}

</section>