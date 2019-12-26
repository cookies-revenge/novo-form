<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

    <div class="input-group {if isset($fieldObj->getSize()) && null !== $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

		<textarea class="form-control" rows="5" 
            {if isset($fieldObj->getResizable()) && !$fieldObj->getResizable()}
                style="resize: none;" 
            {/if}
            name="{$fieldObj->getName()}" 
            placeholder="{if isset($fieldObj->getPlaceholder()) && $fieldObj->getPlaceholder()}{$fieldObj->getPlaceholder()}{/if}"
            vito-name="{$fieldObj->getName()}-{$fieldIndex}"

	        {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 

	        {if $fieldObj->getReadonly()}readonly{/if}
        >{assign var="fieldName" value=$fieldObj->getName()}{if !empty($record) && isset($record[$fieldName])}{$record[$fieldName]}{elseif !empty($presets) && isset($presets[$fieldName])}{$presets[$fieldName]}{/if}</textarea>

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
    </div>
</div>