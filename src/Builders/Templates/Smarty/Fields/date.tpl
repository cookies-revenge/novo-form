{assign var="fieldObject" value=$fieldObj}
{if !empty($subfieldObj)}
   {$fieldObject =$subfieldObj}
{/if}
<div {if $fieldObject->getHtmlClass() !== null}class="{$fieldObject->getHtmlClass()}"{/if}>

    <div class="input-group novo-date-input {if $fieldObject->getSize()}input-group-{$fieldObject->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* default date format *}
        {assign var="dateFormat" value="d.m.Y"}
        {if $fieldObject->getFormat()}
            {* date format override, if defined *}
            {$dateFormat = $fieldObject->getFormat()}
        {/if}

        <input type="text" class="form-control js__datepicker datepicker" 
            name="{$fieldObject->getName()}" 
            vito-name="{$fieldObject->getName()}-{$fieldIndex}" 
            id="input-{$fieldObject->getName()}" 
            data-date-format="{$dateFormat}"
            placeholder="{if $fieldObject->getPlaceholder()}{$fieldObject->getPlaceholder()}{else}Pick a date{/if}" 
            readonly 

            {foreach $fieldObject->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 


            {assign var="fieldName" value=$fieldObject->getName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{date($dateFormat, $record[$fieldName])}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{date($dateFormat, $presets[$fieldName])}"
            {/if} 

            {if $fieldObject->getReadonly()}disabled{/if} />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}

    </div>

</div>