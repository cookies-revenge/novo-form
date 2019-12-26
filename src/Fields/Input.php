<?php
namespace CookiesRevenge\NovoForm\Fields;

class Input extends AbstractFormField
{

    public function __construct()
    {
        $this->fieldTemplate_ = "Fields/input.tpl";
    }

    public function ToHtml()
    {
        return "input";
    }
}
