<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

    <textarea class="form-control novo-richtext js__richtext" rows="5" 
        {if isset($input_variable.resizable) && !$input_variable.resizable}
            style="resize:false;"
        {/if}
        name="{$input_variable.name}" 
        placeholder="{if isset($input_variable.placeholder) && $input_variable.placeholder}{$input_variable.placeholder}{/if}"
        vito-name="{$input_variable.name}-{$field_index}"

        {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 

        {if isset($input_variable.readonly) && $input_variable.readonly}readonly{/if}
    >{if isset($record)}{$record[$input_variable.name]}{elseif isset($presets) && isset($presets[$input_variable.name])}{$presets[$input_variable.name]}{/if}</textarea>

    {if $input_variable.counter}
        <span class="text-gray-600 w-100 novo-richtext-counter-notification js__richtext-counter" 
            data-default-counter-limit="{$input_variable.counter}">
            Remaining: {$input_variable.counter}
        </span>
    {/if}
      
</div>