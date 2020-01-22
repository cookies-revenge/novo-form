{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}

{assign var="fieldLabel" value=$fieldObject->GetLabel()}
{if $fieldLabel !== null && !empty($fieldLabel.text)}
    <label class="form-label w-100 mb-1 
        {if isset($fieldLabel.html_class) && !empty($fieldLabel.html_class)}
            {$fieldLabel.html_class}
        {/if}">
        {if !empty($fieldLabel.text)}
            {$fieldLabel.text}
            {if $fieldObject->GetValidationCriteria("mandatory") !== null}
                <i>*</i>
            {/if}
        {else}
            &nbsp;
        {/if}
    </label>
{/if}