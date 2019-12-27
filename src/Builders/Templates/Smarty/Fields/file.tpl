{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

   <div class="custom-file">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

		<input class="custom-file-input js__file-input" type="file" 
            name="{$fieldObject->getName()}{if $fieldObject->getMultipleChoice()}[]{/if}" 
            vito-name="{$fieldObject->getName()}-{$fieldIndex}"

            {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 

            {if isset($fieldObject->getReadonly()) && $fieldObject->getReadonly()}readonly{/if}
            {if isset($fieldObject->getAcceptTypes()) && $fieldObject->getAcceptTypes()}
                accept="{$fieldObject->getAcceptTypes()}"
            {/if}
            {if isset($fieldObject->getMultipleChoice()) && $fieldObject->getMultipleChoice()}
                multiple="{$fieldObject->getMultipleChoice()}"
            {/if}
        />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
   </div>
</div>