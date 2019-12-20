<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

   <div class="input-group {if isset($input_variable.size) && null !== $input_variable.size}input-group-{$input_variable.size}{/if}">

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "L"}
            <span class="input-group-prepend">
                <i class="input-group-text bg-primary text-white border-primary 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}

        {* defaults *}
        {assign var="option_value_column" value="Id"}
        {assign var="option_label_column" value="Title"}
        {if isset($input_variable.option_value_column) && null !== $input_variable.option_value_column}
            {* override, if defined *}
            {$option_value_column = $input_variable.option_value_column}
        {/if}
        {if isset($input_variable.option_label_column) && null !== $input_variable.option_label_column}
            {* override, if defined *}
            {$option_label_column = $input_variable.option_label_column}
        {/if}

		<select class="form-control custom-select"  
            name="{$input_variable.name}" 
            vito-name="{$input_variable.name}-{$field_index}"
            data-preloaded="{if isset($input_variable.preloaded) && $input_variable.preloaded}true{else}false{/if}" 
            {if isset($input_variable.source_url) && null !== $input_variable.source_url}
                data-source-url="{$input_variable.source_url}"
            {/if}

            {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
            {if isset($input_variable.read_only) && $input_variable.read_only}readonly{/if}>
            {if isset($input_variable.multiple_choice) && $input_variable.multiple_choice}multiple{/if}

            {if isset($input_variable.placeholder) && $input_variable.placeholder}
                <option selected value disabled>{$input_variable.placeholder}</option>
            {/if}

            {if isset($input_variable.preloaded) && $input_variable.preloaded}
                {if isset($field_datasets[$input_variable.name])}
                    {foreach $field_datasets[$input_variable.name] as $dataset_record}
                        <option value="{$dataset_record[$option_value_column]}"
                            {if isset($record)}
                                {if $record[$input_variable.name] === $dataset_record[$option_value_column]}
                                    selected
                                {/if}
                            {elseif isset($presets) && isset($presets[$input_variable.name])}
                                {if $presets[$input_variable.name] === $dataset_record[$option_value_column]}
                                    selected
                                {/if}
                            {/if}>
                            {$dataset_record[$option_label_column]}
                        </option>
                    {/foreach}
                {/if}
            {/if}

        </select>

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "R"}
            <span class="input-group-append">
                <i class="input-group-text bg-primary text-white border-primary 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}
      
   </div>
</div>