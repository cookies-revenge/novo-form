{assign var="fieldObject" value=$fieldObj}
<div class="form-group novo-form-relation-wrapper border border-secondary p-3
    {if $fieldObject->GetHtmlClass()}
        {$fieldObject->GetHtmlClass()}
    {/if}">

    {include file="file:Partials/field_group_label.tpl"}
    {include file="file:Partials/field_group_description.tpl"}
    
    {* Inject field-level preceding partial(s) *}
    {assign var="partials" value=$fieldObject->GetPrecedingPartials()}
    {include file="file:Partials/partial.tpl"}

    {include file="file:Partials/field_group_controls.tpl"}

    {assign var="relIndex" value=0}
    {assign var="relationName" value=$fieldObj->GetName()}
    {if !empty($record) && isset($record[$relationName])}

        {if !empty($record[$relationName])}
            {foreach $record[$relationName] as $relObj}
                {include file="file:Util/relation_inner.tpl"}
                {$relIndex = $relIndex + 1}
            {/foreach}
        {else}
            {include file="file:Util/relation_inner.tpl"}
        {/if}

    {elseif !empty($presets) && isset($presets[$relationName])}

        {foreach $presets[$relationName] as $relObj}
            {include file="file:Util/relation_inner.tpl"}
            {$relIndex = $relIndex + 1}
        {/foreach}
        
    {else}
        {*include file="file:Util/relation_inner.tpl"*}
    {/if}

    {$subfieldObj = null}

    {* Inject field-level succeeding partial(s) *}
    {assign var="partials" value=$fieldObject->GetSucceedingPartials()}
    {include file="file:Partials/partial.tpl"}

</div>