<?php
namespace CookiesRevenge\NovoForm\Fields;

abstract class AbstractFormField
{

    abstract public function ToHtml();

    public function Validate()
    {
        return true;
    }

    public function SetTemplate($fieldTemplate)
    {
        $this->fieldTemplate_ = $fieldTemplate;
        return $this;
    }

    public function GetTemplate()
    {
        return $this->fieldTemplate_;
    }

    public function ToValue()
    {
        if ($this->toValueProcessor_ === null)
            return $this->fieldValue_;

        return $this->toValueProcessor_->call($this, $this->fieldValue_);
    }

    protected $type_ = null;
    protected $name_ = null;
    protected $placeholder_ = null;
    protected $label_ = null;
    protected $description_ = null;
    protected $readonly_ = false;
    protected $htmlClass_ = null;
    protected $availability_ = "*";
    protected $format_ = null;
    protected $size_ = "default";
    protected $resizable_ = false;
    protected $sourceUrl_ = null;
    protected $preloaded_ = true;
    protected $multipleChoice_ = false;
    protected $acceptTypes_ = null;
    protected $optionValueColumn_ = "Id";
    protected $optionLabelColumn_ = "Title";

    protected $precedingPartials_ = [];
    protected $succeedingPartials_ = [];
    protected $visibilityCriterias_ = [];
    protected $validationCriterias_ = [];
    protected $fieldIcons_ = [];

    protected $fieldValue_ = null;
    protected $fieldTemplate_ = null;

    protected $toValueProcessor_ = null;

    /**
     * Get the value of type_
     */
    public function GetType()
    {
        return $this->type_;
    }

    /**
     * Set the value of type_
     *
     * @return  self
     */
    public function SetType($type)
    {
        $this->type_ = $type;

        return $this;
    }

    /**
     * Get the value of name_
     */
    public function GetName()
    {
        return $this->name_;
    }

    /**
     * Set the value of name_
     *
     * @return  self
     */
    public function SetName($name)
    {
        $this->name_ = $name;

        return $this;
    }

    /**
     * Get the value of placeholder_
     */
    public function GetPlaceholder()
    {
        return $this->placeholder_;
    }

    /**
     * Set the value of placeholder_
     *
     * @return  self
     */
    public function SetPlaceholder($placeholder)
    {
        $this->placeholder_ = $placeholder;

        return $this;
    }

    /**
     * Get the value of label_
     */
    public function GetLabel()
    {
        return $this->label_;
    }

    /**
     * Set the value of label_
     *
     * @return  self
     */
    public function SetLabel($label)
    {
        if (\is_array($label) && array_key_exists("text", $label)) {
            $this->label_ = $label;
            return $this;
        }
        if (!empty($label)) {
            $this->label_ = ["text" => $label, "html_class" => null];
        }
        return $this;
    }

    /**
     * Get the value of description_
     */
    public function GetDescription()
    {
        return $this->description_;
    }

    /**
     * Set the value of description_
     *
     * @return  self
     */
    public function SetDescription($description)
    {
        if (\is_array($description) && array_key_exists("text", $description)) {
            $this->description_ = $description;
            return $this;
        }
        if (!empty($description)) {
            $this->description_ = ["text" => $description, "html_class" => null];
        }
        return $this;
    }

    /**
     * Get the value of readonly_
     */
    public function GetReadonly()
    {
        return $this->readonly_;
    }

    /**
     * Set the value of readonly_
     *
     * @return  self
     */
    public function SetReadonly($readonly)
    {
        $this->readonly_ = $readonly;

        return $this;
    }

    /**
     * Get the value of htmlClass_
     */
    public function GetHtmlClass()
    {
        return $this->htmlClass_;
    }

    /**
     * Set the value of htmlClass_
     *
     * @return  self
     */
    public function SetHtmlClass($htmlClass)
    {
        $this->htmlClass_ = $htmlClass;

        return $this;
    }

    /**
     * Get the value of availability_
     */
    public function GetAvailability()
    {
        return $this->availability_;
    }

    /**
     * Set the value of availability_
     *
     * @return  self
     */
    public function SetAvailability($availability)
    {
        $this->availability_ = $availability;

        return $this;
    }

    /**
     * Get the value of format_
     */
    public function GetFormat()
    {
        return $this->format_;
    }

    /**
     * Set the value of format_
     *
     * @return  self
     */
    public function SetFormat($format)
    {
        $this->format_ = $format;

        return $this;
    }

    /**
     * Get the value of size_
     */
    public function GetSize()
    {
        return $this->size_;
    }

    /**
     * Set the value of size_
     *
     * @return  self
     */
    public function SetSize($size)
    {
        $this->size_ = $size;

        return $this;
    }

    /**
     * Get the value of resizable_
     */
    public function GetResizable()
    {
        return $this->resizable_;
    }

    /**
     * Set the value of resizable_
     *
     * @return  self
     */
    public function SetResizable($resizable)
    {
        $this->resizable_ = $resizable;

        return $this;
    }

    /**
     * Get the value of sourceUrl_
     */
    public function GetSourceUrl()
    {
        return $this->sourceUrl_;
    }

    /**
     * Set the value of sourceUrl_
     *
     * @return  self
     */
    public function SetSourceUrl($sourceUrl)
    {
        $this->sourceUrl_ = $sourceUrl;

        return $this;
    }

    /**
     * Get the value of preloaded_
     */
    public function GetPreloaded()
    {
        return $this->preloaded_;
    }

    /**
     * Set the value of preloaded_
     *
     * @return  self
     */
    public function SetPreloaded($preloaded)
    {
        $this->preloaded_ = $preloaded;

        return $this;
    }

    /**
     * Get the value of multipleChoice_
     */
    public function GetMultipleChoice()
    {
        return $this->multipleChoice_;
    }

    /**
     * Set the value of multipleChoice_
     *
     * @return  self
     */
    public function SetMultipleChoice($multipleChoice)
    {
        $this->multipleChoice_ = $multipleChoice;

        return $this;
    }

    /**
     * Get the value of acceptTypes_
     */
    public function GetAcceptTypes()
    {
        return $this->acceptTypes_;
    }

    /**
     * Set the value of acceptTypes_
     *
     * @return  self
     */
    public function SetAcceptTypes($acceptTypes)
    {
        $this->acceptTypes_ = $acceptTypes;

        return $this;
    }

    /**
     * Get the value of precedingPartials_
     */
    public function GetPrecedingPartials()
    {
        return $this->precedingPartials_;
    }

    /**
     * Set the value of precedingPartials_
     *
     * @return  self
     */
    public function SetPrecedingPartials($precedingPartials)
    {
        $this->precedingPartials_ = $precedingPartials;

        return $this;
    }

    /**
     * Get the value of succeedingPartials_
     */
    public function GetSucceedingPartials()
    {
        return $this->succeedingPartials_;
    }

    /**
     * Set the value of succeedingPartials_
     *
     * @return  self
     */
    public function SetSucceedingPartials($succeedingPartials)
    {
        $this->succeedingPartials_ = $succeedingPartials;

        return $this;
    }

    /**
     * Get the value of fieldIcons_
     */
    public function GetFieldIcons()
    {
        return $this->fieldIcons_;
    }

    /**
     * Set the value of fieldIcons_
     *
     * @return  self
     */
    public function SetFieldIcons($fieldIcons)
    {
        $this->fieldIcons_ = $fieldIcons;

        return $this;
    }

    public function IsVisible()
    {

        if (empty($this->visibilityCriterias_))
            return true;

        $isVisible = true;
        foreach ($this->visibilityCriterias_ as $criteria) {
            $test = \CookiesRevenge\NovoForm\Comparator::Compare($criteria["value"], $criteria["against"], $criteria["type"]);
            $isVisible = $isVisible && $test;
        }
        return $isVisible;
    }

    /**
     * Get the value of visibilityCriterias_
     */
    public function GetVisibilityCriterias()
    {
        return $this->visibilityCriterias_;
    }

    /**
     * Set the value of visibilityCriterias_
     *
     * @return  self
     */
    public function SetVisibilityCriterias($visibilityCriterias)
    {
        $this->visibilityCriterias_ = $visibilityCriterias;

        return $this;
    }

    public function AddVisibilityCriteria($criteriaValue, $criteriaAgainst, $criteriaType)
    {
        $this->visibilityCriterias_[] = [
            "value" => $criteriaValue,
            "against" => $criteriaAgainst,
            "type" => $criteriaType
        ];
        return $this;
    }

    public function AddValidationCriteria($criteriaType, $criteriaValue)
    {
        $this->validationCriterias_[$criteriaType] = $criteriaValue;
        return $this;
    }

    public function RemoveValidationCriteria($criteriaType)
    {
        if (isset($this->validationCriterias_[$criteriaType]))
            unset($this->validationCriterias_[$criteriaType]);
        return $this;
    }

    public function AddSucceedingPartial($partial)
    {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->succeedingPartials_[] = $partial;
            return $this;
        }
        $this->succeedingPartials_[] = ["source" => $partial];
        return $this;
    }

    public function AddPrecedingPartial($partial)
    {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->precedingPartials_[] = $partial;
            return $this;
        }
        $this->precedingPartials_[] = ["source" => $partial];
        return $this;
    }

    /**
     * Get the value of fieldValue_
     */
    public function GetFieldValue()
    {
        return $this->fieldValue_;
    }

    /**
     * Set the value of fieldValue_
     *
     * @return  self
     */
    public function SetFieldValue($fieldValue)
    {
        $this->fieldValue_ = $fieldValue;

        return $this;
    }

    /**
     * Get the value of validationCriterias_
     */
    public function GetValidationCriterias()
    {
        return $this->validationCriterias_;
    }

    /**
     * Set the value of validationCriterias_
     *
     * @return  self
     */
    public function SetValidationCriterias($validationCriterias)
    {
        $this->validationCriterias_ = $validationCriterias;

        return $this;
    }

    public function GetValidationCriteria($criteria)
    {
        return $this->validationCriterias_[$criteria] ?? null;
    }

    /**
     * Get the value of optionValueColumn_
     */ 
    public function GetOptionValueColumn()
    {
        return $this->optionValueColumn_;
    }

    /**
     * Set the value of optionValueColumn_
     *
     * @return  self
     */ 
    public function SetOptionValueColumn($optionValueColumn)
    {
        $this->optionValueColumn_ = $optionValueColumn;

        return $this;
    }

    /**
     * Get the value of optionLabelColumn_
     */ 
    public function GetOptionLabelColumn()
    {
        return $this->optionLabelColumn_;
    }

    /**
     * Set the value of optionLabelColumn_
     *
     * @return  self
     */ 
    public function SetOptionLabelColumn($optionLabelColumn)
    {
        $this->optionLabelColumn_ = $optionLabelColumn;

        return $this;
    }

    public function SetToValueProcessor($function)
    {
        $this->toValueProcessor_ = $function;
    }
}
