<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
        <div class="dropdown">
		    <input class="form-control js__input-autocomplete btn btn-dropdown dropdown-toggle cursor-default" 
                type="text" name="{$input_variable.name}{if isset($array)}[]{/if}" 
                vito-name="{$input_variable.name}-{$field_index}" 

                data-autocomplete-search="{$input_variable.autocomplete_url}"
	            {foreach $input_variable.validation as $validation => $value}
                    vito-{$validation}="{$value}"
                {/foreach} 

	                placeholder="{if $input_variable.placeholder}{$input_variable.placeholder}{/if}"

	            {if $input_variable.read_only}
                   readonly
                {/if}

                {if isset($record)}
                   value="{$record[$input_variable.name]}"
                {/if}

                autocomplete="off"
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"
            />
            <ul class="js__autocomplete-result dropdown-menu"></ul>
        </div>
</div>