<?php
namespace CookiesRevenge\NovoForm\Fields;

class Date extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/date.tpl";
    }

    public function ToHtml()
    {
        return "date";
    }
    
}
