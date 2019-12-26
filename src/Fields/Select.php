<?php
namespace CookiesRevenge\NovoForm\Fields;

class Select extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/select.tpl";
    }

    public function ToHtml()
    {
        return "select";
    }

    public function ToValue() {
        if ($this->multipleChoice_ === true)
            return json_decode($this->fieldValue_);

        return $this->fieldValue_;
    }
    
}
