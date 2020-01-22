{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject = $subfieldObj}
{/if}

{assign var="fieldName" value=$fieldObject->GetName()}
{if $fieldObj->GetType() === "relation"}
   {$fieldName = "{$fieldObj->GetName()}[{$subfieldObj->GetName()}][]"}
{/if}

<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

    <input type="hidden" 
        name="{$fieldName}" 

    {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
        data-validation-{$validationType}="{$value}"
    {/foreach}

    {if $fieldObj->GetType() === "relation"}
        {assign var="fName" value=$fieldObj->GetName()}
        {assign var="sfName" value=$subfieldObj->GetName()}
        {if !empty($record) && isset($record.$fName.$relIndex)}
            value="{$record.$fName.$relIndex.$sfName}"
        {elseif !empty($presets) && isset($presets.$fName.$relIndex)}
            value="{$presets.$fName.$relIndex.$sfName}"
        {/if}
    {else}
        {if !empty($record) && isset($record[$fieldName])}
            value="{$record[$fieldName]}"
        {elseif !empty($presets) && isset($presets[$fieldName])}
            value="{$presets[$fieldName]}"
        {/if}
    {/if}
    />
</div>