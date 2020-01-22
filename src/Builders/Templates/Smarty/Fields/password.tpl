{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject = $subfieldObj}
{/if}

{assign var="fieldName" value=$fieldObject->GetName()}
{if $fieldObj->GetType() === "relation"}
   {$fieldName = "{$fieldObj->GetName()}[{$subfieldObj->GetName()}][]"}
{/if}

<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObject->GetSize()}input-group-{$fieldObject->GetSize()}{/if}">

      {assign var="iconPosition" value="L"}
      {include file="Partials/field_icon.tpl"}

		<input class="form-control" type="password" 
         name="{$fieldName}" 
         placeholder="{if $fieldObject->GetPlaceholder()}{$fieldObject->GetPlaceholder()}{/if}"

	      {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
            data-validation-{$validationType}="{$value}"
         {/foreach}

	      {if $fieldObject->GetReadonly()}readonly{/if}
      />

      {assign var="iconPosition" value="R"}
      {include file="Partials/field_icon.tpl"}
      
   </div>
</div>