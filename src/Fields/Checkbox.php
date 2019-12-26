<?php
namespace CookiesRevenge\NovoForm\Fields;

class Checkbox extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/checkbox.tpl";
    }

    public function ToHtml()
    {
        return "checkbox";
    }
    
}