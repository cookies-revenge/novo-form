<div>
		<input type="hidden" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}-{$field_index}" 

        {if isset($input_variable.validation)}
	    {foreach $input_variable.validation as $validation => $value}
            vito-{$validation}="{$value}"
        {/foreach}
        {/if}


        {if isset($record)}
           value="{$record[$input_variable.name]}"
        {else}
            value="{$input_variable.value}"
        {/if}
        
        />
</div>