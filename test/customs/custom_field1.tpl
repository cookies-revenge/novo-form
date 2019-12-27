{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
    {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

    <div class="input-group {if $fieldObject->getSize()}input-group-{$fieldObject->getSize()}{/if}">

        <input class="form-control" type="color" 
            name="{$fieldObject->getName()}" 
            placeholder="{if $fieldObject->getPlaceholder() !== null}{$fieldObject->getPlaceholder()}{/if}"
            vito-name="{$fieldObject->getName()}-{$fieldIndex}"

            {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 

            {if $fieldObject->getReadonly() === true}readonly{/if}

            {assign var="fieldName" value=$fieldObject->getName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{$record[$fieldName]}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{$presets[$fieldName]}"
            {/if}
        />
        
    </div>
</div>