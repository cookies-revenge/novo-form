{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject = $subfieldObj}
{/if}

{assign var="fieldName" value=$fieldObject->GetName()}
{if $fieldObj->GetType() === "relation"}
   {$fieldName = "{$fieldObj->GetName()}[{$subfieldObj->GetName()}][]"}
{/if}

<div {if $fieldObject->GetHtmlClass()}class="{$fieldObject->GetHtmlClass()}"{/if}>

    <div class="input-group {if $fieldObject->GetSize()}input-group-{$fieldObject->GetSize()}{/if} novo-checkbox">

        {if $fieldObj->GetType() === "relation"}

            {assign var="fName" value=$fieldObj->GetName()}
            {assign var="sfName" value=$subfieldObj->GetName()}

            {if isset($record)}

                <input type="hidden" 
                    name="{$fieldName}" 

                    {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                        data-validation-{$validationType}="{$value}"
                    {/foreach} 

                    value="0" />

                <input type="checkbox" 
                    name="{$fieldName}" 
                    class="form-control"

                    {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                        data-validation-{$validationType}="{$value}"
                    {/foreach} 

                    {if !empty($record) && isset($record.$fName.$relIndex.$sfName)}
                        {if !empty($record.$fName.$relIndex.$sfName)}
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
                    class="form-control"

                    {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                        data-validation-{$validationType}="{$value}"
                    {/foreach} 

                    {if $fieldObject->GetReadonly()}readonly{/if} 

                    {if !empty($presets) && isset($presets.$fName.$relIndex.$sfName)}
                        {if !empty($presets.$fName.$relIndex.$sfName)}
                            checked
                        {/if}
                    {/if}
                    value="1" />

            {/if}

        {else}

            {if isset($record)}

                <input type="hidden" 
                    name="{$fieldName}" 

                    {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                        data-validation-{$validationType}="{$value}"
                    {/foreach} 

                    value="0" />

                <input type="checkbox" 
                    name="{$fieldName}" 
                    class="form-control"

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
                    class="form-control"

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

        {/if}

    </div>

</div>