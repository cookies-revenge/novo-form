<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

    <input type="hidden" 
        name="{$fieldObj->getName()}" 
        vito-name="{$fieldObj->getName()}-{$fieldIndex}" 

    {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
        vito-{$validationType}="{$value}"
    {/foreach}

    {assign var="fieldName" value=$fieldObj->getName()}
    {if !empty($record) && isset($record[$fieldName])}
        value="{$record[$fieldName]}"
    {elseif !empty($presets) && isset($presets[$fieldName])}
        value="{$presets[$fieldName]}"
    {/if} />
</div>