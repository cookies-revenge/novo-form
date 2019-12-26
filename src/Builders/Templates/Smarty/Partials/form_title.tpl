{assign var="formTitle" value=$formObj->getTitle()}
{if $formTitle !== null}
    <div class="novo-form-title">
        <{$formTitle.type} class="text-gray-800 {$formTitle.type}
        {if isset($formTitle.html_class) && !empty($formTitle.html_class)}
            {$formTitle.html_class}
        {/if}">
            {$formTitle.text}
        </{$formTitle.type}>
    </div>
{/if}