{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

    <textarea class="form-control novo-richtext js__richtext" rows="5" 
        {if isset($fieldObject->getResizable()) && !$fieldObject->getResizable()}
            style="resize:false;"
        {/if}
        name="{$fieldObject->getName()}" 
        placeholder="{if $fieldObject->getPlaceholder()}{$fieldObject->getPlaceholder()}{/if}"
        vito-name="{$fieldObject->getName()}-{$fieldIndex}"

        {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
            vito-{$validationType}="{$value}"
        {/foreach}

        {if isset($fieldObject->getReadonly()) && $fieldObject->getReadonly()}readonly{/if}
    >{assign var="fieldName" value=$fieldObject->getName()}{if !empty($record) && isset($record[$fieldName])}{$record[$fieldName]}{elseif !empty($presets) && isset($presets[$fieldName])}{$presets[$fieldName]}{/if}</textarea>

    {if $fieldObject->getValidationCriteria("max-length") !== null}
        <span class="text-gray-600 w-100 novo-richtext-counter-notification js__richtext-counter" 
            data-default-counter-limit="{$fieldObject->getValidationCriteria("max-length")}">
            Remaining: <i>{$fieldObject->getValidationCriteria("max-length")}</i>
        </span>
    {/if}
      
</div>