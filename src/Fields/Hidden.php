<?php
namespace CookiesRevenge\NovoForm\Fields;

class Hidden extends AbstractFormField
{

    public function __construct()
    {
        $this->fieldTemplate_ = "Fields/hidden.tpl";
    }

    public function ToHtml()
    {
        return "hidden";
    }
}
