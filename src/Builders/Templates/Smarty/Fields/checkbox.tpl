<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

    <div class="input-group {if isset($input_variable.size) && null !== $input_variable.size}input-group-{$input_variable.size}{/if} novo-checkbox">

        {if isset($record)}

            <input type="hidden" 
                name="{$input_variable.name}" 
                vito-name="{$input_variable.name}"

                {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
                value="{if null !== $record[$input_variable.name] && $record[$input_variable.name] != 0}1{else}0{/if}" />

            <input type="checkbox" 
                name="{$input_variable.name}" 
                vito-name="{$input_variable.name}-{$field_index}"

                {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
                {if null !== $record[$input_variable.name] && $record[$input_variable.name] != 0}checked{/if} 
                value="1" />

        {else}
        
            <input type="hidden" 
                name="{$input_variable.name}" 
                vito-name="{$input_variable.name}"

                {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
                {if $input_variable.readonly}readonly{/if} 
                value="0" />

            <input type="checkbox" 
                name="{$input_variable.name}" 
                vito-name="{$input_variable.name}-{$field_index}"

                {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
                {if $input_variable.readonly}readonly{/if} 
                {if $input_variable.checked}checked{/if} value="1" />

        {/if}

    </div>

</div>