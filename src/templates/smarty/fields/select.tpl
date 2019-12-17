<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    <div class="dropdown js__dropdown w-100" id="js__field-{$input_variable.name}">

	    <button class="form-control btn btn-dropdown dropdown-toggle"{if $input_variable.read_only} disabled {/if}type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    <span class="dropdown-selection">
                {if isset($record)}
                    {if isset($field_datasets[$input_variable.name])}
                        {foreach $field_datasets[$input_variable.name] as $dataset_record}
                            {if $dataset_record.Id == $record[$input_variable.name]}
                                {$dataset_record.Title}
                            {/if}
		                {/foreach}
                    {else}
			            {$record[$input_variable.name]}
                    {/if}
                {elseif isset($defaults) && isset($defaults[$input_variable.name])}
                    {if isset($field_datasets[$input_variable.name])}
                        {foreach $field_datasets[$input_variable.name] as $dataset_record}
                            {if $dataset_record.Id == $defaults[$input_variable.name]}
                                {$dataset_record.Title}
                            {/if}
		                {/foreach}
                    {else}
			            {$record[$input_variable.name]}
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
            {if isset($field_datasets[$input_variable.name])}
		        <li>
			        <a href="javascript:;" class="reset-dropdown js__reset-dropdown">Clear selection</a>
		        </li>
                <li>
                    <input type="text" class="js__dropdown-searchkey search-dropdown" placeholder="Search options...">
                </li>
		        {foreach $field_datasets[$input_variable.name] as $dataset_record}
		            <li>
                        <a href="javascript:;" data-id="{$dataset_record.Id}">{$dataset_record.Title}</a>
                    </li>
		        {/foreach}
            {/if}
	    </ul>

	    <input type="hidden" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}-{$field_index}"
		    {foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach}
            {if isset($record)}
                value="{$record[$input_variable.name]}"
            {elseif isset($defaults) && isset($defaults[$input_variable.name])}
                value="{$defaults[$input_variable.name]}"
            {/if}
        />
    </div>
</div>