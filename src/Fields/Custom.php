<?php
namespace CookiesRevenge\NovoForm\Fields;

class Custom extends AbstractFormField
{
    public function __construct()
    {
        $this->fieldTemplate_ = null;
    }

    public function ToHtml()
    {
        return "custom";
    }
}
