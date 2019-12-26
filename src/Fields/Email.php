<?php
namespace CookiesRevenge\NovoForm\Fields;

class Email extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/email.tpl";
    }

    public function ToHtml()
    {
        return "email";
    }
    
}
