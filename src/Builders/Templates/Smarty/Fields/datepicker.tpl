<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

    <div class="input-group novo-date-input {if isset($input_variable.size) && null !== $input_variable.size}input-group-{$input_variable.size}{/if}">

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "L"}
            <span class="input-group-prepend">
                <i class="input-group-text bg-dark text-white border-dark 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}

        {* default date format *}
        {assign var="date_format" value="d.m.Y"}
        {if isset($input_variable.format) && null !== $input_variable.format}
            {* date format override, if defined *}
            {$date_format = $input_variable.format}
        {/if}

        <input type="text" class="form-control js__datepicker datepicker" 
            name="{$input_variable.name}" 
            vito-name="{$input_variable.name}-{$field_index}" 
            id="input-{$input_variable.name}" 
            data-date-format="{$date_format}"
            placeholder="{if $input_variable.placeholder}{$input_variable.placeholder}{else}Pick a date{/if}" 
            readonly 

            {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach}

            {if isset($record)}
                value="{date($date_format, $record[$input_variable.name])}"
            {elseif isset($presets) && isset($presets[$input_variable.name])}
                value="{date($date_format, $presets[$input_variable.name])}"
            {/if} 

            {if $input_variable.readonly}disabled{/if} />

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "R"}
            <span class="input-group-append">
                <i class="input-group-text bg-dark text-white border-dark 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}

    </div>

</div>