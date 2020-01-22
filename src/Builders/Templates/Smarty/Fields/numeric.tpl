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

		<input class="form-control" type="number" 
         name="{$fieldName}" 
         placeholder="{if $fieldObject->GetPlaceholder()}{$fieldObject->GetPlaceholder()}{/if}"

	      {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
            data-validation-{$validationType}="{$value}"
         {/foreach}

	      {if $fieldObject->GetReadonly()}readonly{/if}

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

      {assign var="iconPosition" value="R"}
      {include file="Partials/field_icon.tpl"}
      
   </div>
</div>