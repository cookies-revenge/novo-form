{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

   <div class="input-group {if $fieldObject->GetSize()}input-group-{$fieldObject->GetSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* defaults *}
        {assign var="optionValueColumn" value="Id"}
        {assign var="optionLabelColumn" value="Title"}
        {if $fieldObject->GetOptionValueColumn()}
            {* override, if defined *}
            {$optionValueColumn = $fieldObject->GetOptionValueColumn()}
        {/if}
        {if $fieldObject->GetOptionLabelColumn()}
            {* override, if defined *}
            {$optionLabelColumn = $fieldObject->GetOptionLabelColumn()}
        {/if}

		<select class="form-control custom-select"  
            name="{$fieldObject->GetName()}" 
            data-preloaded="{if isset($fieldObject->GetPreloaded()) && $fieldObject->GetPreloaded()}true{else}false{/if}" 
            {if isset($fieldObject->GetSourceUrl()) && null !== $fieldObject->GetSourceUrl()}
                data-source-url="{$fieldObject->GetSourceUrl()}"
            {/if}

            {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                data-validation-{$validationType}="{$value}"
            {/foreach}

            {if $fieldObject->GetReadonly()}readonly{/if}>
            {if $fieldObject->GetMultipleChoice()}multiple{/if}

            {if $fieldObject->GetPlaceholder()}
                <option selected value disabled>{$fieldObject->GetPlaceholder()}</option>
            {/if}

            {assign var="fieldName" value=$fieldObject->GetName()}
            {if $fieldObject->GetPreloaded()}
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