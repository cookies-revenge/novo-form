<?php
namespace CookiesRevenge\NovoForm\Fields;

class Timestamp extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/date.tpl";
    }

    public function ToHtml()
    {
        return "timestamp";
    }

    public function ToValue() {
        return strtotime($this->fieldValue_);
    }
    
}
