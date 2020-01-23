<div class="form-group w-100 novo-form-fieldgroup-controls-wrapper border border-secondary p-2">
    {foreach $fieldObject->GetControlObjects() as $controlObj}
        {if $controlObj->GetAvailability() === "*" || 
            (!empty($record) && $controlObj->GetAvailability() === "edit") || 
            (empty($record) && $controlObj->GetAvailability() === "new")}
            {include file="file:Controls/control.tpl"}
        {/if}
    {/foreach}
</div>