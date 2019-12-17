<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    <textarea class="form-control" name="{$input_variable.name}{if isset($array)}[]{/if}" vito-name="{$input_variable.name}-{$field_index}" 
    {foreach $input_variable.validation as $validation => $value}
        vito-{$validation}="{$value}"
    {/foreach} 
    rows="5" 
    placeholder="{if $input_variable.placeholder}{$input_variable.placeholder}{/if}"
    {if $input_variable.read_only}
        readonly
    {/if}>{if isset($record)}{$record[$input_variable.name]}{/if}</textarea>
</div>