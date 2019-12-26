<div {if $fieldObj->getHtmlClass() !== null}class="{$fieldObj->getHtmlClass()}"{/if}>

    <div class="input-group novo-date-input {if $fieldObj->getSize()}input-group-{$fieldObj->getSize()}{/if}">

        {assign var="iconPosition" value="L"}
        {include file="Partials/field_icon.tpl"}

        {* default date format *}
        {assign var="dateFormat" value="d.m.Y"}
        {if $fieldObj->getFormat()}
            {* date format override, if defined *}
            {$dateFormat = $fieldObj->getFormat()}
        {/if}

        <input type="text" class="form-control js__datepicker datepicker" 
            name="{$fieldObj->getName()}" 
            vito-name="{$fieldObj->getName()}-{$fieldIndex}" 
            id="input-{$fieldObj->getName()}" 
            data-date-format="{$dateFormat}"
            placeholder="{if $fieldObj->getPlaceholder()}{$fieldObj->getPlaceholder()}{else}Pick a date{/if}" 
            readonly 

            {foreach $fieldObj->getValidationCriterias() as $validationType => $value}
                vito-{$validationType}="{$value}"
            {/foreach} 


            {assign var="fieldName" value=$fieldObj->getName()}
            {if !empty($record) && isset($record[$fieldName])}
                value="{date($dateFormat, $record[$fieldName])}"
            {elseif !empty($presets) && isset($presets[$fieldName])}
                value="{date($dateFormat, $presets[$fieldName])}"
            {/if} 

            {if $fieldObj->getReadonly()}disabled{/if} />

        {assign var="iconPosition" value="R"}
        {include file="Partials/field_icon.tpl"}

    </div>

</div>