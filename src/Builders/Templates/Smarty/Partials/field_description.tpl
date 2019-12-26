{if $fieldObj->getDescription() !== null}
    {assign var="fieldDescription" value=$fieldObj->getDescription()}
    <small class="label-description w-100 mt-1 mb-1 
    {if isset($fieldDescription.html_class) && !empty($fieldDescription.html_class)}
        {$fieldDescription.html_class}
    {/if}">{$fieldDescription.text}</small>
{/if}