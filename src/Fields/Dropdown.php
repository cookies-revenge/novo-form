<?php
namespace CookiesRevenge\NovoForm\Fields;

class Dropdown extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Fields/dropdown.tpl";
    }

    public function ToHtml()
    {
        return "dropdown";
    }

    public function ToValue() {
        if ($this->multipleChoice_ === true)
            return json_decode($this->fieldValue_);

        return $this->fieldValue_;
    }
    
}
