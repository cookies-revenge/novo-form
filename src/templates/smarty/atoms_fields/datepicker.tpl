<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>
    <div class="input-group date">
        <input type="text" class="form-control js__datepicker datepicker" name="{$input_variable.name}{if isset($array)}[]{/if}" 
            vito-name="{$input_variable.name}-{$field_index}" 
            id="input-{$input_variable.name}" 
            {foreach $input_variable.validation as $validation => $value}
                vito-{$validation}="{$value}"
            {/foreach}
            placeholder="{if $input_variable.placeholder}{$input_variable.placeholder}{else}Pick a date{/if}" 
            {if isset($record)}
                value="{date('d.m.Y', $record[$input_variable.name])}"
            {elseif isset($defaults) && isset($defaults[$input_variable.name])}
                value="{date('d.m.Y', $defaults[$input_variable.name])}"
            {/if} 
            readonly
            {if $input_variable.read_only}
               disabled
            {/if} 
        />
        <span class="input-group-append">
            <i class="far fa-calendar-alt input-group-text bg-primary text-white border-primary"></i>
        </span>
    </div>
</div>