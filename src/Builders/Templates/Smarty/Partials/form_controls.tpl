<div class="form-group w-100 novo-form-controls-wrapper border border-secondary p-2">
    {foreach $formObj->getControlObjects() as $controlObj}
        {if $controlObj->getAvailability() === "*" || 
            (!empty($record) && $controlObj->getAvailability() === "edit") || 
            (empty($record) && $controlObj->getAvailability() === "new")}
            {include file="file:Controls/control.tpl"}
        {/if}
    {/foreach}
</div>