<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

    {* defaults *}
    {assign var="option_value_column" value="Id"}
    {assign var="option_label_column" value="Title"}
    {if isset($input_variable.option_value_column) && null !== $input_variable.option_value_column}
        {* override, if defined *}
        {$option_value_column = $input_variable.option_value_column}
    {/if}
    {if isset($input_variable.option_label_column) && null !== $input_variable.option_label_column}
        {* override, if defined *}
        {$option_label_column = $input_variable.option_label_column}
    {/if}

    <div class="dropdown js__dropdown w-100"
        data-preloaded="{if isset($input_variable.preloaded) && $input_variable.preloaded}true{else}false{/if}" 
        {if isset($input_variable.source_url) && null !== $input_variable.source_url}
            data-source-url="{$input_variable.source_url}"
        {/if}>

        <button class="form-control btn btn-dropdown dropdown-toggle"
            {if $input_variable.read_only}disabled{/if} 
            type="button" 
            data-toggle="dropdown" 
            aria-haspopup="true" 
            aria-expanded="true">
		    <span class="dropdown-selection">
                {if isset($record)}
                    {if isset($field_datasets[$input_variable.name])}
                        {foreach $field_datasets[$input_variable.name] as $dataset_record}
                            {if $dataset_record[$option_value_column] === $record[$input_variable.name]}
                                {$dataset_record[$option_title_column]}
                            {/if}
		                {/foreach}
                    {else}
			            {$record[$input_variable.name]}
                    {/if}
                {elseif isset($presets) && isset($presets[$input_variable.name])}
                    {if isset($field_datasets[$input_variable.name])}
                        {foreach $field_datasets[$input_variable.name] as $dataset_record}
                            {if $dataset_record[$option_value_column] === $presets[$input_variable.name]}
                                {$dataset_record[$option_title_column]}
                            {/if}
		                {/foreach}
                    {else}
			            {$presets[$input_variable.name]}
                    {/if}
			    {else}
			        {if $input_variable.placeholder}
                        {$input_variable.placeholder}
                    {else}
                        Select option
                    {/if}
			    {/if}
		    </span>
		    <span class="caret"></span>
	    </button>

        <ul class="dropdown-menu" aria-labelledby="js__field-label-{$input_variable.name}">
            <li>
                <a href="javascript:;" class="reset-dropdown js__reset-dropdown">Clear selection</a>
            </li>
            <li>
                <input type="text" class="js__dropdown-searchkey search-dropdown" placeholder="Search options...">
            </li>
            {if isset($input_variable.preloaded) && $input_variable.preloaded}
                {if isset($field_datasets[$input_variable.name])}
                    {foreach $field_datasets[$input_variable.name] as $dataset_record}
                        <li>
                            <a href="javascript:;" data-id="{$dataset_record[$option_value_column]}">
                                {$dataset_record[$option_title_column]}
                            </a>
                        </li>
                    {/foreach}
                {/if}
            {/if}
	    </ul>

        <input type="hidden" 
            name="{$input_variable.name}" 
            vito-name="{$input_variable.name}-{$field_index}" 

		    {foreach $input_variable.validation as $validation_type => $value}
                vito-{$validation_type}="{$value}"
            {/foreach}

            {if isset($record)}
                value="{$record[$input_variable.name]}"
            {elseif isset($presets) && isset($presets[$input_variable.name])}
                value="{$presets[$input_variable.name]}"
            {/if}
        />

    </div>
</div>