{if $fieldObj->getLabel() !== null}
    {assign var="fieldLabel" value=$fieldObj->getLabel()}
    <label class="form-label w-100 
        {if isset($fieldLabel.html_class) && !empty($fieldLabel.html_class)}
            {$fieldLabel.html_class}
        {/if}">
        {if !empty($fieldLabel.text)}
            {$fieldLabel.text}
            {if $fieldObj->getValidationCriteria("mandatory") !== null}
                <i>*</i>
            {/if}
        {else}
            &nbsp;
        {/if}
    </label>
{/if}