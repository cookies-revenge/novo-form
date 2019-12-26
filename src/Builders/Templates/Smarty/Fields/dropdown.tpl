<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

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

    <div class="dropdown js__dropdown w-100"
        data-preloaded="{if $fieldObj->getPreloaded()}true{else}false{/if}" 
        {if $fieldObj->getSourceUrl()}
            data-source-url="{$fieldObj->getSourceUrl()}"
        {/if}>

        <button class="form-control btn btn-dropdown dropdown-toggle"
            {if $fieldObj->getReadonly()}disabled{/if} 
            type="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="true">
		    <span class="dropdown-selection">
                {assign var="fieldName" value=$fieldObj->getName()}
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
			        {if $fieldObj->getPlaceholder()}
                        {$fieldObj->getPlaceholder()}
                    {else}
                        Select option
                    {/if}
			    {/if}
		    </span>
		    <span class="caret"></span>
	    </button>

        <ul class="dropdown-menu" aria-labelledby="js__field-label-{$fieldObj->getName()}">
            <li>
                <a href="javascript:;" class="reset-dropdown js__reset-dropdown">Clear selection</a>
            </li>
            <li>
                <input type="text" class="js__dropdown-searchkey search-dropdown" placeholder="Search options...">
            </li>
            {if $fieldObj->getPreloaded()}
                {if isset($fieldDatasets[$fieldObj->getName()])}
                    {foreach $fieldDatasets[$fieldObj->getName()] as $datasetRecord}
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
            name="{$fieldObj->getName()}" 
            vito-name="{$fieldObj->getName()}-{$fieldIndex}" 

		    {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach}

            {assign var="fieldName" value=$fieldObj->getName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{$record[$fieldName]}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{$presets[$fieldName]}"
            {/if}
        />

    </div>
</div>