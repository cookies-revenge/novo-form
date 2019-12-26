<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if}">

      {assign var="iconPosition" value="L"}
      {include file="Partials/field_icon.tpl"}

		<input class="form-control" type="password" 
         name="{$fieldObj->getName()}" 
         placeholder="{if $fieldObj->getPlaceholder()}{$fieldObj->getPlaceholder()}{/if}"
         vito-name="{$fieldObj->getName()}-{$fieldIndex}"

	      {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
            vito-{$validationType}="{$value}"
         {/foreach}

	      {if $fieldObj->getReadonly()}readonly{/if}
      />

      {assign var="iconPosition" value="R"}
      {include file="Partials/field_icon.tpl"}
      
   </div>
</div>