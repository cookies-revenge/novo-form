<?php
namespace CookiesRevenge\NovoForm\Fields;

class Richtext extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/richtext.tpl";
    }

    public function ToHtml()
    {
        return "richtext";
    }

    public function ToValue() {
        return $this->fieldValue_;
    }
    
}
