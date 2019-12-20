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

		<input class="form-control" type="number" 
         name="{$input_variable.name}" 
         placeholder="{if isset($input_variable.placeholder) && $input_variable.placeholder}{$input_variable.placeholder}{/if}"
         vito-name="{$input_variable.name}-{$field_index}"

	      {foreach $input_variable.validation as $validation_type => $value}vito-{$validation_type}="{$value}"{/foreach} 

	      {if isset($input_variable.read_only) && $input_variable.read_only}readonly{/if}

         {if isset($record)}
            value="{$record[$input_variable.name]}"
         {elseif isset($presets) && isset($presets[$input_variable.name])}
            value="{$presets[$input_variable.name]}"
         {/if}
      />

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