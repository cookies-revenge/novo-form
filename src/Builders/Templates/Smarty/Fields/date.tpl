{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->GetHtmlClass() !== null}class="{$fieldObject->GetHtmlClass()}"{/if}>

    <div class="input-group novo-date-input {if $fieldObject->GetSize()}input-group-{$fieldObject->GetSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* default date format *}
        {assign var="dateFormat" value="Y-m-d"}
        {if $fieldObject->GetFormat()}
            {* date format override, if defined *}
            {$dateFormat = $fieldObject->GetFormat()}
        {/if}

        <input type="date" class="form-control" 
            name="{$fieldObject->GetName()}" 
            id="input-{$fieldObject->GetName()}" 
            data-date-format="{$dateFormat}"
            placeholder="{if $fieldObject->GetPlaceholder()}{$fieldObject->GetPlaceholder()}{else}Pick a date{/if}" 
            {if $fieldObject->GetReadonly()}readonly{/if}
            {if $fieldObject->GetValidationCriteria("min-value") !== null}
                min="{$fieldObject->GetValidationCriteria("min-value")}"
            {/if}
            {if $fieldObject->GetValidationCriteria("max-value") !== null}
                max="{$fieldObject->GetValidationCriteria("max-value")}"
            {/if}

            {foreach $fieldObject->GetValidationCriterias() as $validationType => $value}
                data-validation-{$validationType}="{$value}"
            {/foreach} 


            {assign var="fieldName" value=$fieldObject->GetName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{date($dateFormat, $record[$fieldName])}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{date($dateFormat, $presets[$fieldName])}"
            {else}
                value="{date($dateFormat, time())}"
            {/if} />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}

    </div>

</div>