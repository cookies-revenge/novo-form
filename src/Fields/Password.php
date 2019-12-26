<?php
namespace CookiesRevenge\NovoForm\Fields;

class Password extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/password.tpl";
    }

    public function ToHtml()
    {
        return "password";
    }
    
}
