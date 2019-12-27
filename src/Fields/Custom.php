<?php
namespace CookiesRevenge\NovoForm\Fields;

use SuperClosure\Serializer;

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

    public function ToValue()
    {
        if ($this->toValueProcessor_ === null)
            return $this->fieldValue_;

        if (\is_callable($this->toValueProcessor_))
            return $this->toValueProcessor_($this->fieldValue_);

        return \call_user_func($this->fieldValue_, [$this->fieldValue_]);
    }

    public function SetFieldTemplate($templateFile)
    {
        $this->fieldTemplate_ = $templateFile;
        return $this;
    }

    public function SetToValueProcessor($function)
    {
        if ($function instanceof \Closure) {
            $serializer = new Serializer();
            $function = $serializer->serialize($function);
        }
        $this->toValueProcessor_ = $function;
    }

    private $toValueProcessor_ = null;
}
