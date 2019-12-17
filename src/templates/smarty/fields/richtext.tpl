<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    <textarea class="form-control richtext js__richtext" id="{$input_variable.name}" name="{$input_variable.name}{if isset($array)}[]{/if}" 
        vito-name="{$input_variable.name}-{$field_index}"
		{foreach $input_variable.validation as $validation => $value}
              vito-{$validation}="{$value}"
        {/foreach}
		{if $input_variable.read_only}
            readonly
        {/if}>{if isset($record)}{$record[$input_variable.name]}{/if}</textarea>
	{if $input_variable.counter}
        <span class="text-gray-600 rte-counter-notification js__rte-counter" 
              data-default-counter-limit="{$input_variable.counter}">
            Remaining (HTML): {$input_variable.counter}
        </span>
    {/if}
	{if isset($input_variable.counter_cleartext)}
        <span class="text-gray-600 rte-counter-notification js__rte-counter-cleartext" 
              data-default-counter-limit="{$input_variable.counter_cleartext}">
            Remaining (cleartext): {$input_variable.counter_cleartext}
        </span>
    {/if}
</div>