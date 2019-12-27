{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

    <input type="hidden" 
        name="{$fieldObject->getName()}" 
        vito-name="{$fieldObject->getName()}-{$fieldIndex}" 

    {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
        vito-{$validationType}="{$value}"
    {/foreach}

    {assign var="fieldName" value=$fieldObject->getName()}
    {if !empty($record) && isset($record[$fieldName])}
        value="{$record[$fieldName]}"
    {elseif !empty($presets) && isset($presets[$fieldName])}
        value="{$presets[$fieldName]}"
    {/if} />
</div>