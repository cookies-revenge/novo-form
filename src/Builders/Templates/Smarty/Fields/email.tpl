<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if}">

      {assign var="iconPosition" value="L"}
      {include file="Partials/field_icon.tpl"}

		<input class="form-control" type="email" 
         name="{$fieldObj->getName()}" 
         placeholder="{if $fieldObj->getPlaceholder() !== null}{$fieldObj->getPlaceholder()}{/if}"
         vito-name="{$fieldObj->getName()}-{$fieldIndex}"

	      {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
            vito-{$validationType}="{$value}"
         {/foreach} 

	      {if $fieldObj->getReadonly() === true}readonly{/if}

         {assign var="fieldName" value=$fieldObj->getName()}
         {if !empty($record) && isset($record[$fieldName])}
            value="{$record[$fieldName]}"
         {elseif !empty($presets) && isset($presets[$fieldName])}
            value="{$presets[$fieldName]}"
         {/if}
      />

      {assign var="iconPosition" value="R"}
      {include file="Partials/field_icon.tpl"}
      
   </div>
</div>