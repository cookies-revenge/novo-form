<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

    <textarea class="form-control novo-richtext js__richtext" rows="5" 
        {if isset($fieldObj->getResizable()) && !$fieldObj->getResizable()}
            style="resize:false;"
        {/if}
        name="{$fieldObj->getName()}" 
        placeholder="{if $fieldObj->getPlaceholder()}{$fieldObj->getPlaceholder()}{/if}"
        vito-name="{$fieldObj->getName()}-{$fieldIndex}"

        {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
            vito-{$validationType}="{$value}"
        {/foreach}

        {if isset($fieldObj->getReadonly()) && $fieldObj->getReadonly()}readonly{/if}
    >{assign var="fieldName" value=$fieldObj->getName()}{if !empty($record) && isset($record[$fieldName])}{$record[$fieldName]}{elseif !empty($presets) && isset($presets[$fieldName])}{$presets[$fieldName]}{/if}</textarea>

    {if $fieldObj->getValidationCriteria("max-length") !== null}
        <span class="text-gray-600 w-100 novo-richtext-counter-notification js__richtext-counter" 
            data-default-counter-limit="{$fieldObj->getValidationCriteria("max-length")}">
            Remaining: <i>{$fieldObj->getValidationCriteria("max-length")}</i>
        </span>
    {/if}
      
</div>