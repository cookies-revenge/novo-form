{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject = $subfieldObj}
{/if}

{assign var="fieldName" value=$fieldObject->GetName()}
{if $fieldObj->GetType() === "relation"}
   {$fieldName = "{$fieldObj->GetName()}[{$subfieldObj->GetName()}][]"}
{/if}

<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

    <textarea class="form-control novo-richtext js__richtext" rows="5" 
        {if isset($fieldObject->GetResizable()) && !$fieldObject->GetResizable()}
            style="resize:false;"
        {/if}
        name="{$fieldName}" 
        placeholder="{if $fieldObject->GetPlaceholder()}{$fieldObject->GetPlaceholder()}{/if}"

        {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
            data-validation-{$validationType}="{$value}"
        {/foreach}

        {if isset($fieldObject->GetReadonly()) && $fieldObject->GetReadonly()}readonly{/if}
    >{if $fieldObj->GetType() === "relation"}{assign var="fName" value=$fieldObj->GetName()}{assign var="sfName" value=$subfieldObj->GetName()}{if !empty($record) && isset($record.$fName.$relIndex)}{$record.$fName.$relIndex.$sfName}{elseif !empty($presets) && isset($presets.$fName.$relIndex)}{$presets.$fName.$relIndex.$sfName}{/if}{else}{if !empty($record) && isset($record[$fieldName])}{$record[$fieldName]}{elseif !empty($presets) && isset($presets[$fieldName])}{$presets[$fieldName]}{/if}{/if}</textarea>

    {if $fieldObject->GetValidationCriteria("max-length") !== null}
        <span class="text-gray-600 w-100 novo-richtext-counter-notification js__richtext-counter" 
            data-default-counter-limit="{$fieldObject->GetValidationCriteria("max-length")}">
            Remaining: <i>{$fieldObject->GetValidationCriteria("max-length")}</i>
        </span>
    {/if}
      
</div>