{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
{if $fieldObject->getLabel() !== null}
    {assign var="fieldLabel" value=$fieldObject->getLabel()}
    <label class="form-label w-100 mb-1 
        {if isset($fieldLabel.html_class) && !empty($fieldLabel.html_class)}
            {$fieldLabel.html_class}
        {/if}">
        {if !empty($fieldLabel.text)}
            {$fieldLabel.text}
            {if $fieldObject->getValidationCriteria("mandatory") !== null}
                <i>*</i>
            {/if}
        {else}
            &nbsp;
        {/if}
    </label>
{/if}