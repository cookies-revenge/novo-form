<?php
namespace CookiesRevenge\NovoForm\Fields;

use Opis\Closure\SerializableClosure;

class Custom extends AbstractFormField
{
    public function __construct()
    {
        $this->fieldTemplate_ = null;
    }

    public function ToHtml()
    {
        return "custom";
    }

    public function SetFieldTemplate($templateFile)
    {
        $this->fieldTemplate_ = $templateFile;
        return $this;
    }
}
