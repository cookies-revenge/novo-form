{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObject->getSize()}input-group-{$fieldObject->getSize()}{/if}">

      {assign var="iconPosition" value="L"}
      {include file="Partials/field_icon.tpl"}

		<input class="form-control" type="password" 
         name="{$fieldObject->getName()}" 
         placeholder="{if $fieldObject->getPlaceholder()}{$fieldObject->getPlaceholder()}{/if}"
         vito-name="{$fieldObject->getName()}-{$fieldIndex}"

	      {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
            vito-{$validationType}="{$value}"
         {/foreach}

	      {if $fieldObject->getReadonly()}readonly{/if}
      />

      {assign var="iconPosition" value="R"}
      {include file="Partials/field_icon.tpl"}
      
   </div>
</div>