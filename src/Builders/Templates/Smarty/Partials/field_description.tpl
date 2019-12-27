{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
{if $fieldObject->getDescription() !== null}
    {assign var="fieldDescription" value=$fieldObject->getDescription()}
    <p class="label-description w-100 mb-1 text-secondary font-italic
        {if isset($fieldDescription.html_class) && !empty($fieldDescription.html_class)}
            {$fieldDescription.html_class}
        {/if}">
        <small>{$fieldDescription.text}</small>
    </p>
{/if}