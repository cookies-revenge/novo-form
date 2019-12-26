<?php
namespace CookiesRevenge\NovoForm\Fields;

class Textarea extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/textarea.tpl";
    }

    public function ToHtml()
    {
        return "textarea";
    }

    public function ToValue() {
        return $this->fieldValue_;
    }
    
}
