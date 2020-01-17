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

    public function ListFields()
    {
        return $this->subfields_;
    }

    private $subfields_ = [];
    

    /**
     * Get the value of subfields_
     */ 
    public function GetSubfields()
    {
        return $this->subfields_;
    }

    /**
     * Set the value of subfields_
     *
     * @return  self
     */ 
    public function SetSubfields($subfields)
    {
        $this->subfields_ = $subfields;
        return $this;
    }

    public function GetSubfieldByName($subfieldName)
    {
        if (isset($this->subfields_[$subfieldName]))
            return $this->subfields_[$subfieldName];
        
        return null;
    }

    public function PrependSubfield($fieldObj)
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field prepended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_ = [$fieldObj->getName() => $fieldObj] + $this->subfields_;
    }

    public function AppendSubfield($fieldObj)
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_[$fieldObj->getName()] = $fieldObj;
    }

    public function AddSubfieldBefore($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_ = array_slice($this->subfields_, 0, array_search($name, array_keys($this->subfields_)), true)
            + [$fieldObj->getName() => $fieldObj]
            + array_slice($this->subfields_, array_search($name, array_keys($this->subfields_)), count($this->subfields_), true);
    }

    public function AddSubfieldAfter($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->subfields_ = array_slice($this->subfields_, 0, array_search($name, array_keys($this->subfields_)) + 1, true)
            + [$fieldObj->getName() => $fieldObj]
            + array_slice($this->subfields_, array_search($name, array_keys($this->subfields_)) + 1, count($this->subfields_), true);
    }
}
