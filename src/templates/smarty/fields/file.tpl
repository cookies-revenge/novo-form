<div {if $input_variable.html_class}class="{$input_variable.html_class}"{/if}>

   <div class="custom-file">

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "L"}
            <span class="input-group-prepend custom-file-label">
                <i class="input-group-text bg-primary text-white border-primary 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}

		<input class="custom-file-input" type="file" 
            name="{$input_variable.name}" 
            vito-name="{$input_variable.name}-{$field_index}"
            {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 
            {if isset($input_variable.readonly) && $input_variable.readonly}readonly{/if}
        />

        {if isset($input_variable.icon) && null !== $input_variable.icon && isset($input_variable.icon.position) && $input_variable.icon.position === "R"}
            <span class="input-group-append custom-file-label">
                <i class="input-group-text bg-primary text-white border-primary 
                    {if isset($input_variable.icon.html_class) && !empty($input_variable.icon.html_class)}{$input_variable.icon.html_class}{/if}">
                    {if isset($input_variable.icon.description) && !empty($input_variable.icon.description)}{$input_variable.icon.description}{/if}
                </i>
            </span>
        {/if}
      
   </div>
</div>