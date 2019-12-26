<?php
namespace CookiesRevenge\NovoForm\Fields;

class Numeric extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/numeric.tpl";
    }

    public function ToHtml()
    {
        return "numeric";
    }
    
}
