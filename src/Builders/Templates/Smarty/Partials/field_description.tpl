{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}

{assign var="fieldDescription" value=$fieldObject->GetDescription()}
{if $fieldDescription !== null && !empty($fieldDescription.text)}
    {assign var="fieldDescription" value=$fieldObject->GetDescription()}
    <p class="label-description w-100 mb-1 text-secondary font-italic
        {if isset($fieldDescription.html_class) && !empty($fieldDescription.html_class)}
            {$fieldDescription.html_class}
        {/if}">
        <small>{$fieldDescription.text}</small>
    </p>
{/if}