<div {if $fieldObj->getHtmlClass()}class="{$fieldObj->getHtmlClass()}"{/if}>

    {assign var="fieldName" value=$fieldObj->getName()}
    <div class="input-group {if $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if} novo-checkbox">

        {if isset($record)}

            <input type="hidden" 
                name="{$fieldName}" 
                vito-name="{$fieldName}"

                {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                    vito-{$validationType}="{$value}"
                {/foreach} 

                value="{if null !== $record[$fieldName] && $record[$fieldName] != 0}1{else}0{/if}" />

            <input type="checkbox" 
                name="{$fieldName}" 
                vito-name="{$fieldName}-{$fieldIndex}"

                {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                    vito-{$validationType}="{$value}"
                {/foreach} 

                {if !empty($record) && isset($record[$fieldName])}
                    {if !empty($record[$fieldName])}
                        checked
                    {/if}
                {/if} 
                value="1" />

        {else}
        
            <input type="hidden" 
                name="{$fieldName}" 
                vito-name="{$fieldName}"

                {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                    vito-{$validationType}="{$value}"
                {/foreach} 

                {if $fieldObj->getReadonly()}readonly{/if} 
                value="0" />

            <input type="checkbox" 
                name="{$fieldName}" 
                vito-name="{$fieldName}-{$fieldIndex}"

                {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                    vito-{$validationType}="{$value}"
                {/foreach} 

                {if $fieldObj->getReadonly()}readonly{/if} 

                {if !empty($presets) && isset($presets[$fieldName])}
                    {if !empty($presets[$fieldName])}
                        checked
                    {/if}
                {/if}
                value="1" />

        {/if}

    </div>

</div>