<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

    <input type="hidden" 
        name="{$input_variable.name}" 
        vito-name="{$input_variable.name}-{$field_index}" 

    {if isset($input_variable.validation)}
        {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach}
    {/if}

    {if isset($record)}
        value="{$record[$input_variable.name]}"
    {else}
        value="{$input_variable.value}"
    {/if}/>
</div>