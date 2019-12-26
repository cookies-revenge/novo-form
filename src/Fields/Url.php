<?php
namespace CookiesRevenge\NovoForm\Fields;

class Url extends AbstractFormField
{

    public function __construct()
    {
        $this->fieldTemplate_ = "Fields/url.tpl";
    }

    public function ToHtml()
    {
        return "url";
    }
}
