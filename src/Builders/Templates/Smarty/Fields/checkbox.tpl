{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

    {assign var="fieldName" value=$fieldObject->GetName()}
    <div class="input-group {if $fieldObject->GetSize()}input-group-{$fieldObject->GetSize()}{/if} novo-checkbox">

        {if isset($record)}

            <input type="hidden" 
                name="{$fieldName}" 

                {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                    data-validation-{$validationType}="{$value}"
                {/foreach} 

                value="{if null !== $record[$fieldName] && $record[$fieldName] != 0}1{else}0{/if}" />

            <input type="checkbox" 
                name="{$fieldName}" 

                {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                    data-validation-{$validationType}="{$value}"
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

                {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                    data-validation-{$validationType}="{$value}"
                {/foreach} 

                {if $fieldObject->GetReadonly()}readonly{/if} 
                value="0" />

            <input type="checkbox" 
                name="{$fieldName}" 

                {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                    data-validation-{$validationType}="{$value}"
                {/foreach} 

                {if $fieldObject->GetReadonly()}readonly{/if} 

                {if !empty($presets) && isset($presets[$fieldName])}
                    {if !empty($presets[$fieldName])}
                        checked
                    {/if}
                {/if}
                value="1" />

        {/if}

    </div>

</div>