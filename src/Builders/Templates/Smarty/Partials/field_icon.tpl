{if !empty($fieldObj->getFieldIcons())}
    {foreach $fieldObj->getFieldIcons() as $fieldIcon}
        {if $fieldIcon.position === $iconPosition}
            <span class="input-group-{if $iconPosition === "L"}prepend{else}append{/if} {if $fieldObj->getType() === "file"}custom-file-label{/if}">
                <i class="input-group-text bg-dark text-white border-dark 
                    {if isset($fieldIcon.html_class) && !empty($fieldIcon.html_class)}{$fieldIcon.html_class}{/if}">
                    {if isset($fieldIcon.description) && !empty($fieldIcon.description)}{$fieldIcon.description}{/if}
                </i>
            </span>
        {/if}
    {/foreach}
{/if}