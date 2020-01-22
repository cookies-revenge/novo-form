{assign var="fieldObject" value=$fieldObj}
<div class="form-group novo-form-field-group-wrapper border border-secondary p-3
    {if $fieldObject->GetHtmlClass()}
        {$fieldObject->GetHtmlClass()}
    {/if}">

    {include file="file:Partials/field_group_label.tpl"}
    {include file="file:Partials/field_group_description.tpl"}
    
    {* Inject field-level preceding partial(s) *}
    {assign var="partials" value=$fieldObject->GetPrecedingPartials()}
    {include file="file:Partials/partial.tpl"}

    {foreach $fieldObject->GetSubfields() as $subfieldObj}

        {if $subfieldObj->GetAvailability() === "*" || 
            (!empty($record) && $subfieldObj->GetAvailability() === "edit") || 
            (empty($record) && $subfieldObj->GetAvailability() === "new")}

            <div class="form-group w-100 novo-form-field-wrapper">
                {include file="file:Partials/field_label.tpl"}
                {include file="file:Partials/field_description.tpl"}
                {include file="file:{$subfieldObj->GetTemplate()}"}
            </div>
        {/if}

    {/foreach}

    {$subfieldObj = null}

    {* Inject field-level succeeding partial(s) *}
    {assign var="partials" value=$fieldObject->GetSucceedingPartials()}
    {include file="file:Partials/partial.tpl"}

</div>