{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

    <div class="input-group {if isset($fieldObject->getSize()) && null !== $fieldObject->getSize()}input-group-{$fieldObject->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

		<textarea class="form-control" rows="5" 
            {if isset($fieldObject->getResizable()) && !$fieldObject->getResizable()}
                style="resize: none;" 
            {/if}
            name="{$fieldObject->getName()}" 
            placeholder="{if isset($fieldObject->getPlaceholder()) && $fieldObject->getPlaceholder()}{$fieldObject->getPlaceholder()}{/if}"
            vito-name="{$fieldObject->getName()}-{$fieldIndex}"

	        {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 

	        {if $fieldObject->getReadonly()}readonly{/if}
        >{assign var="fieldName" value=$fieldObject->getName()}{if !empty($record) && isset($record[$fieldName])}{$record[$fieldName]}{elseif !empty($presets) && isset($presets[$fieldName])}{$presets[$fieldName]}{/if}</textarea>

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
    </div>
</div>