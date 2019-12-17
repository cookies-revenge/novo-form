<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    {if isset($record)}
		<input type="hidden" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}"
			{foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach} 
			value="{if null !== $record[$input_variable.name] && $record[$input_variable.name] != 0}1{else}0{/if}"
        />
		<input type="checkbox" name="{$input_variable.name}" vito-name="{$input_variable.name}-{$field_index}"
			{foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach} 
			{if null !== $record[$input_variable.name] && $record[$input_variable.name] != 0}
                checked
            {/if} 
			value="1"
        />
	{else}
		<input type="hidden" name="{$input_variable.name}" vito-name="{$input_variable.name}"
			{foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach} 
			{if $input_variable.read_only}
                readonly
            {/if} 
            value="0"
        />
		<input type="checkbox" name="{$input_variable.name}" vito-name="{$input_variable.name}-{$field_index}"
			{foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach} 
			{if $input_variable.read_only}
                readonly
            {/if} 
			{if $input_variable.checked}
                checked
            {/if} 
			value="1"
        />
	{/if}
</div>