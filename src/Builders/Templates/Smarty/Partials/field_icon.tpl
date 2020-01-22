{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
{if !empty($fieldObject->GetFieldIcons())}
    {foreach $fieldObject->GetFieldIcons() as $fieldIcon}
        {if $fieldIcon.position === $iconPosition}
            <span class="input-group-{if $iconPosition === "L"}prepend{else}append{/if} {if $fieldObject->GetType() === "file"}custom-file-label{/if}">
                <i class="input-group-text bg-dark text-white border-dark 
                    {if isset($fieldIcon.html_class) && !empty($fieldIcon.html_class)}{$fieldIcon.html_class}{/if}">
                    {if isset($fieldIcon.description) && !empty($fieldIcon.description)}{$fieldIcon.description}{/if}
                </i>
            </span>
        {/if}
    {/foreach}
{/if}