{assign var="fieldGroupLabel" value=$fieldObj->getLabel()}
{if $fieldGroupLabel}
    <p class="novo-field-group-label {if $fieldGroupLabel.html_class}{$fieldGroupLabel.html_class}{/if}">
        {if $fieldGroupLabel.text}
            {$fieldGroupLabel.text}
        {/if}
    </p>
{/if}