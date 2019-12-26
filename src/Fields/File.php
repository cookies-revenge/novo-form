<?php
namespace CookiesRevenge\NovoForm\Fields;

class File extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/file.tpl";
    }

    public function ToHtml()
    {
        return "file";
    }
    
}
