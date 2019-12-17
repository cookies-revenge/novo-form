<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
		<input class="form-control" type="url" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}-{$field_index}" 

	    {foreach $input_variable.validation as $validation => $value}
            vito-{$validation}="{$value}"
        {/foreach} 

	        placeholder="{if $input_variable.placeholder}{$input_variable.placeholder}{/if}"

	    {if $input_variable.read_only}
           readonly
        {/if}

        {if isset($record)}
           value="{$record[$input_variable.name]}"
        {elseif isset($defaults) && isset($defaults[$input_variable.name])}
           value="{$defaults[$input_variable.name]}"
        {/if}
        
        />
</div>