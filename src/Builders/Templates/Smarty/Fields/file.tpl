<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

   <div class="custom-file">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

		<input class="custom-file-input js__file-input" type="file" 
            name="{$fieldObj->getName()}{if $fieldObj->getMultipleChoice()}[]{/if}" 
            vito-name="{$fieldObj->getName()}-{$fieldIndex}"

            {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 

            {if isset($fieldObj->getReadonly()) && $fieldObj->getReadonly()}readonly{/if}
            {if isset($fieldObj->getAcceptTypes()) && $fieldObj->getAcceptTypes()}
                accept="{$fieldObj->getAcceptTypes()}"
            {/if}
            {if isset($fieldObj->getMultipleChoice()) && $fieldObj->getMultipleChoice()}
                multiple="{$fieldObj->getMultipleChoice()}"
            {/if}
        />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
   </div>
</div>