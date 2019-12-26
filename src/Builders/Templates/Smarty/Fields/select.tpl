<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* defaults *}
        {assign var="optionValueColumn" value="Id"}
        {assign var="optionLabelColumn" value="Title"}
        {if $fieldObj->getOptionValueColumn()}
            {* override, if defined *}
            {$optionValueColumn = $fieldObj->getOptionValueColumn()}
        {/if}
        {if $fieldObj->getOptionLabelColumn()}
            {* override, if defined *}
            {$optionLabelColumn = $fieldObj->getOptionLabelColumn()}
        {/if}

		<select class="form-control custom-select"  
            name="{$fieldObj->getName()}" 
            vito-name="{$fieldObj->getName()}-{$fieldIndex}"
            data-preloaded="{if isset($fieldObj->getPreloaded()) && $fieldObj->getPreloaded()}true{else}false{/if}" 
            {if isset($fieldObj->getSourceUrl()) && null !== $fieldObj->getSourceUrl()}
                data-source-url="{$fieldObj->getSourceUrl()}"
            {/if}

            {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach}

            {if $fieldObj->getReadonly()}readonly{/if}>
            {if $fieldObj->getMultipleChoice()}multiple{/if}

            {if $fieldObj->getPlaceholder()}
                <option selected value disabled>{$fieldObj->getPlaceholder()}</option>
            {/if}

            {assign var="fieldName" value=$fieldObj->getName()}
            {if $fieldObj->getPreloaded()}
                {if isset($fieldDatasets[$fieldName])}
                    {foreach $fieldDatasets[$fieldName] as $datasetRecord}
                        <option value="{$datasetRecord[$optionValueColumn]}"
                            {if !empty($record) && isset($record[$fieldName])}
                                {if $record[$fieldName] === $datasetRecord[$optionValueColumn]}
                                    selected
                                {/if}
                            {elseif !empty($presets) && isset($presets[$fieldName])}
                                {if $presets[$fieldName] === $datasetRecord[$optionValueColumn]}
                                    selected
                                {/if}
                            {/if}>
                            {$datasetRecord[$optionLabelColumn]}
                        </option>
                    {/foreach}
                {/if}
            {/if}

        </select>

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}
      
   </div>
</div>