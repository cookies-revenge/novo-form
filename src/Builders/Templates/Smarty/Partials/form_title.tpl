{assign var="formTitle" value=$formObj->GetTitle()}
{if $formTitle !== null}
    <div class="novo-form-title
        {if isset($formTitle.html_class) && !empty($formTitle.html_class)}
            {$formTitle.html_class}
        {/if}">
        <{$formTitle.type} class="text-gray-800 {$formTitle.type}">
            {$formTitle.text}
        </{$formTitle.type}>
    </div>
{/if}