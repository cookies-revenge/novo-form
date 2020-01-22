<?php
namespace CookiesRevenge\NovoForm\Fields;

class Relation extends AbstractFormField
{

    public function __construct() 
    {
        $this->fieldTemplate_ = "Util/relation.tpl";
    }

    public function ToHtml()
    {
        return "relation";
    }

    public function ToValue()
    {
        return parent::ToValue();
    }

    public function ToEntity($orm)
    {
        $return = [];
        $relValues = $this->ToValue();

        for ($ind = 0; $ind < $this->count(); $ind++) {

            $relId = $relValues[$this->optionValueColumn_][$ind] ?? null;
            $relEntityBuilder = new \CookiesRevenge\NovoForm\Entities\EntityBuilder($orm, $this->className_, $relId);
            $relObject = $relEntityBuilder->Build();

            foreach ($relValues as $relName => $relValue) {
                
                if ($this->GetSubfieldByName($relName)->GetAvailability() === "edit" && $relId === null)
                    continue;

                $relObject->SetPropertyByName($relName, $relValue[$ind]);
            }

            if ($relObject->IsModified())
                $return[] = $relObject;

        }

        return $return;
    }

    private function count()
    {
        $keys = array_keys($this->subfields_);

        if (empty($keys))
            return 0;

        $value = $this->ToValue();
        
        if ($value === null)
            return 0;

        $index = 0;
        while ($this->GetSubfieldByName($keys[$index])->GetAvailability() === "edit")
            $index++;
        
        return count($value[$keys[$index]]);
    }

    public function ListFields()
    {
        return $this->GetSubfields();
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

    public function SetRelationType($relationType)
    {
        $this->relationType_ = $relationType;
        return $this;
    }

    public function GetRelationType()
    {
        return $this->relationType_;
    }

    public function SetClassName($className)
    {
        $this->className_ = $className;
        return $this;
    }

    public function GetClassName()
    {
        return $this->className_;
    }

    private $relationType_ = null;
    private $className_ = null;
}
