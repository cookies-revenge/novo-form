<?php
namespace CookiesRevenge\NovoForm\Fields;

class FieldGroup extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Util/field_group.tpl";
    }

    public function ToHtml()
    {
        return "field_group";
    }

    public function ToValue() {
        return null;
    }

    private $subfields_ = [];
    

    /**
     * Get the value of subfields_
     */ 
    public function getSubfields()
    {
        return $this->subfields_;
    }

    /**
     * Set the value of subfields_
     *
     * @return  self
     */ 
    public function setSubfields($subfields)
    {
        $this->subfields_ = $subfields;
        return $this;
    }

    public function prependSubfield($subfieldObj)
    {
        if (!($subfieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Subfield prepended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_ = [$subfieldObj->getName() => $subfieldObj] + $this->subfields_;
    }

    public function appendSubfield($subfieldObj)
    {
        if (!($subfieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Subfield appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_[$subfieldObj->getName()] = $subfieldObj;
    }
}
