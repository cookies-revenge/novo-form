{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

   <div class="custom-file">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

		<input class="custom-file-input js__file-input" type="file" 
            name="{$fieldObject->GetName()}{if $fieldObject->GetMultipleChoice()}[]{/if}" 

            {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                data-validation-{$validationType}="{$value}"
            {/foreach} 

            {if isset($fieldObject->GetReadonly()) && $fieldObject->GetReadonly()}readonly{/if}
            {if isset($fieldObject->GetAcceptTypes()) && $fieldObject->GetAcceptTypes()}
                accept="{$fieldObject->GetAcceptTypes()}"
            {/if}
            {if isset($fieldObject->GetMultipleChoice()) && $fieldObject->GetMultipleChoice()}
                multiple="{$fieldObject->GetMultipleChoice()}"
            {/if}
        />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
   </div>
</div>