{if $partials !== null && !empty($partials)}
    {foreach $partials as $partial}
        {include file="file:{$partial.source}"}
    {/foreach}
{/if}