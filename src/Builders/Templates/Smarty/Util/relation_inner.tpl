<div class="container-fluid border border-secondary pt-3 mb-2 novo-form-relation-entity-wrapper">
    <p class="alert alert-secondary">{$fieldObj->GetName()}</p>

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
</div>