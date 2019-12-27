{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject = $subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass()}class="{$fieldObject->getHtmlClass()}"{/if}>

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

    <div class="dropdown js__dropdown w-100"
        data-preloaded="{if $fieldObject->getPreloaded()}true{else}false{/if}" 
        {if $fieldObject->getSourceUrl()}
            data-source-url="{$fieldObject->getSourceUrl()}"
        {/if}>

        <button class="form-control btn btn-dropdown dropdown-toggle"
            {if $fieldObject->getReadonly()}disabled{/if} 
            type="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="true">
		    <span class="dropdown-selection">
                {assign var="fieldName" value=$fieldObject->getName()}
                {if !empty($record) && isset($record[$fieldName])}
                    {if isset($fieldDatasets[$fieldName])}
                        {foreach $fieldDatasets[$fieldName] as $datasetRecord}
                            {if $datasetRecord[$optionValueColumn] === $record[$fieldName]}
                                {$datasetRecord[$optionLabelColumn]}
                            {/if}
		                {/foreach}
                    {else}
			            {$record[$fieldName]}
                    {/if}
                {elseif isset($presets) && isset($presets[$fieldName])}
                    {if isset($fieldDatasets[$fieldName])}
                        {foreach $fieldDatasets[$fieldName] as $datasetRecord}
                            {if $datasetRecord[$optionValueColumn] === $presets[$fieldName]}
                                {$datasetRecord[$optionLabelColumn]}
                            {/if}
		                {/foreach}
                    {else}
			            {$presets[$fieldName]}
                    {/if}
			    {else}
			        {if $fieldObject->getPlaceholder()}
                        {$fieldObject->getPlaceholder()}
                    {else}
                        Select option
                    {/if}
			    {/if}
		    </span>
		    <span class="caret"></span>
	    </button>

        <ul class="dropdown-menu" aria-labelledby="js__field-label-{$fieldObject->getName()}">
            <li>
                <a href="javascript:;" class="reset-dropdown js__reset-dropdown">Clear selection</a>
            </li>
            <li>
                <input type="text" class="js__dropdown-searchkey search-dropdown" placeholder="Search options...">
            </li>
            {if $fieldObject->getPreloaded()}
                {if isset($fieldDatasets[$fieldObject->getName()])}
                    {foreach $fieldDatasets[$fieldObject->getName()] as $datasetRecord}
                        <li>
                            <a href="javascript:;" data-id="{$datasetRecord[$optionValueColumn]}">
                                {$datasetRecord[$optionLabelColumn]}
                            </a>
                        </li>
                    {/foreach}
                {/if}
            {/if}
	    </ul>

        <input type="hidden" 
            name="{$fieldObject->getName()}" 
            vito-name="{$fieldObject->getName()}-{$fieldIndex}" 

		    {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach}

            {assign var="fieldName" value=$fieldObject->getName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{$record[$fieldName]}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{$presets[$fieldName]}"
            {/if}
        />

    </div>
</div>