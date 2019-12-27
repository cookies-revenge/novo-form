{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObject->getSize()}input-group-{$fieldObject->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* defaults *}
        {assign var="optionValueColumn" value="Id"}
        {assign var="optionLabelColumn" value="Title"}
        {if $fieldObject->getOptionValueColumn()}
            {* override, if defined *}
            {$optionValueColumn = $fieldObject->getOptionValueColumn()}
        {/if}
        {if $fieldObject->getOptionLabelColumn()}
            {* override, if defined *}
            {$optionLabelColumn = $fieldObject->getOptionLabelColumn()}
        {/if}

		<select class="form-control custom-select"  
            name="{$fieldObject->getName()}" 
            vito-name="{$fieldObject->getName()}-{$fieldIndex}"
            data-preloaded="{if isset($fieldObject->getPreloaded()) && $fieldObject->getPreloaded()}true{else}false{/if}" 
            {if isset($fieldObject->getSourceUrl()) && null !== $fieldObject->getSourceUrl()}
                data-source-url="{$fieldObject->getSourceUrl()}"
            {/if}

            {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach}

            {if $fieldObject->getReadonly()}readonly{/if}>
            {if $fieldObject->getMultipleChoice()}multiple{/if}

            {if $fieldObject->getPlaceholder()}
                <option selected value disabled>{$fieldObject->getPlaceholder()}</option>
            {/if}

            {assign var="fieldName" value=$fieldObject->getName()}
            {if $fieldObject->getPreloaded()}
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