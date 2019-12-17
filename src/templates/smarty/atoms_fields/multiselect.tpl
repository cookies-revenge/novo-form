<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    <div class="dropdown dropdown-multiselect js_mod-dropdown-multiselect" id="js__field-{$input_variable.name}">

	    <button class="btn btn-dropdown dropdown-toggle" type="button" id="js__filter-label-{$input_variable.name}" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
		    <span class="dropdown-selection">
		        {if isset($record)}
		            {count($record[$input_variable.name])} selected
		        {else}
		            {if null !== $input_variable.placeholder}
		                {$input_variable.placeholder}
		            {else}
                        Select options
		            {/if}
		        {/if}
		    </span>
		    <span class="caret"></span>
	    </button>

	    <ul class="dropdown-menu" aria-labelledby="js__filter-label-{$input_variable.name}">
		    <li>
			    <a href="javascript:;" class="reset-dropdown js__reset-dropdown">Clear selection</a>
		    </li>
		    <li>
			    <input type="text" class="js_mod-dropdown-searchkey" placeholder="Search options..." />
		    </li>
		    {foreach $field_datasets[$input_variable.name] as $dataset_record}
		        <li {if isset($dataset_record.Parent)}data-parent="{$dataset_record.Parent}"{/if}>
			        <label for="{$input_variable.name}-{$dataset_record.Id}">
				        <input type="checkbox" id="{$input_variable.name}-{$dataset_record.Id}" value="{$dataset_record.Id}"
					        {if isset($record)}
					            {if !empty($record[$input_variable.name])}
					                {if array_key_exists($dataset_record.Id, $record[$input_variable.name])}
					                    checked
					                {/if}
					            {/if}
					        {/if} 
                        />
				        {$dataset_record.Title}
			        </label>
		        </li>
		    {/foreach}
	    </ul>

	    <input type="hidden" id="multiselect-{$input_variable.name}" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}-{$field_index}"
		    {foreach $input_variable.validation as $validation => $value}
               vito-{$validation}="{$value}"
            {/foreach}
		    {if isset($record)}
		        {if !empty($record->get_attribute("{$input_variable.name}"))}
		            value="{json_encode(array_keys($record[$input_variable.name]))}"
		        {/if}
            {elseif isset($defaults) && isset($defaults[$input_variable.name])}
                {if !empty($defaults->get_attribute("{$input_variable.name}"))}
		            value="{json_encode(array_keys($defaults[$input_variable.name]))}"
		        {/if}
		    {/if} 
        />
    </div>
</div>