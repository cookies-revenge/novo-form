<?php
namespace CookiesRevenge\NovoForm\Fields;

abstract class AbstractFormField
{

    abstract public function ToHtml();

    public function Validate()
    {
        return true;
    }

    public function GetTemplate()
    {
        return $this->fieldTemplate_;
    }

    public function ToValue()
    {
        return $this->fieldValue_;
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

    /**
     * Get the value of type_
     */
    public function getType()
    {
        return $this->type_;
    }

    /**
     * Set the value of type_
     *
     * @return  self
     */
    public function setType($type)
    {
        $this->type_ = $type;

        return $this;
    }

    /**
     * Get the value of name_
     */
    public function getName()
    {
        return $this->name_;
    }

    /**
     * Set the value of name_
     *
     * @return  self
     */
    public function setName($name)
    {
        $this->name_ = $name;

        return $this;
    }

    /**
     * Get the value of placeholder_
     */
    public function getPlaceholder()
    {
        return $this->placeholder_;
    }

    /**
     * Set the value of placeholder_
     *
     * @return  self
     */
    public function setPlaceholder($placeholder)
    {
        $this->placeholder_ = $placeholder;

        return $this;
    }

    /**
     * Get the value of label_
     */
    public function getLabel()
    {
        return $this->label_;
    }

    /**
     * Set the value of label_
     *
     * @return  self
     */
    public function setLabel($label)
    {
        if (\is_array($label) && array_key_exists("text", $label)) {
            $this->label_ = $label;
            return $this;
        }
        $this->label_ = ["text" => $label, "html_class" => null];
        return $this;
    }

    /**
     * Get the value of description_
     */
    public function getDescription()
    {
        return $this->description_;
    }

    /**
     * Set the value of description_
     *
     * @return  self
     */
    public function setDescription($description)
    {
        if (\is_array($description) && array_key_exists("text", $description)) {
            $this->description_ = $description;
            return $this;
        }
        $this->description_ = ["text" => $description, "html_class" => null];
        return $this;
    }

    /**
     * Get the value of readonly_
     */
    public function getReadonly()
    {
        return $this->readonly_;
    }

    /**
     * Set the value of readonly_
     *
     * @return  self
     */
    public function setReadonly($readonly)
    {
        $this->readonly_ = $readonly;

        return $this;
    }

    /**
     * Get the value of htmlClass_
     */
    public function getHtmlClass()
    {
        return $this->htmlClass_;
    }

    /**
     * Set the value of htmlClass_
     *
     * @return  self
     */
    public function setHtmlClass($htmlClass)
    {
        $this->htmlClass_ = $htmlClass;

        return $this;
    }

    /**
     * Get the value of availability_
     */
    public function getAvailability()
    {
        return $this->availability_;
    }

    /**
     * Set the value of availability_
     *
     * @return  self
     */
    public function setAvailability($availability)
    {
        $this->availability_ = $availability;

        return $this;
    }

    /**
     * Get the value of format_
     */
    public function getFormat()
    {
        return $this->format_;
    }

    /**
     * Set the value of format_
     *
     * @return  self
     */
    public function setFormat($format)
    {
        $this->format_ = $format;

        return $this;
    }

    /**
     * Get the value of size_
     */
    public function getSize()
    {
        return $this->size_;
    }

    /**
     * Set the value of size_
     *
     * @return  self
     */
    public function setSize($size)
    {
        $this->size_ = $size;

        return $this;
    }

    /**
     * Get the value of resizable_
     */
    public function getResizable()
    {
        return $this->resizable_;
    }

    /**
     * Set the value of resizable_
     *
     * @return  self
     */
    public function setResizable($resizable)
    {
        $this->resizable_ = $resizable;

        return $this;
    }

    /**
     * Get the value of sourceUrl_
     */
    public function getSourceUrl()
    {
        return $this->sourceUrl_;
    }

    /**
     * Set the value of sourceUrl_
     *
     * @return  self
     */
    public function setSourceUrl($sourceUrl)
    {
        $this->sourceUrl_ = $sourceUrl;

        return $this;
    }

    /**
     * Get the value of preloaded_
     */
    public function getPreloaded()
    {
        return $this->preloaded_;
    }

    /**
     * Set the value of preloaded_
     *
     * @return  self
     */
    public function setPreloaded($preloaded)
    {
        $this->preloaded_ = $preloaded;

        return $this;
    }

    /**
     * Get the value of multipleChoice_
     */
    public function getMultipleChoice()
    {
        return $this->multipleChoice_;
    }

    /**
     * Set the value of multipleChoice_
     *
     * @return  self
     */
    public function setMultipleChoice($multipleChoice)
    {
        $this->multipleChoice_ = $multipleChoice;

        return $this;
    }

    /**
     * Get the value of acceptTypes_
     */
    public function getAcceptTypes()
    {
        return $this->acceptTypes_;
    }

    /**
     * Set the value of acceptTypes_
     *
     * @return  self
     */
    public function setAcceptTypes($acceptTypes)
    {
        $this->acceptTypes_ = $acceptTypes;

        return $this;
    }

    /**
     * Get the value of precedingPartials_
     */
    public function getPrecedingPartials()
    {
        return $this->precedingPartials_;
    }

    /**
     * Set the value of precedingPartials_
     *
     * @return  self
     */
    public function setPrecedingPartials($precedingPartials)
    {
        $this->precedingPartials_ = $precedingPartials;

        return $this;
    }

    /**
     * Get the value of succeedingPartials_
     */
    public function getSucceedingPartials()
    {
        return $this->succeedingPartials_;
    }

    /**
     * Set the value of succeedingPartials_
     *
     * @return  self
     */
    public function setSucceedingPartials($succeedingPartials)
    {
        $this->succeedingPartials_ = $succeedingPartials;

        return $this;
    }

    /**
     * Get the value of fieldIcons_
     */
    public function getFieldIcons()
    {
        return $this->fieldIcons_;
    }

    /**
     * Set the value of fieldIcons_
     *
     * @return  self
     */
    public function setFieldIcons($fieldIcons)
    {
        $this->fieldIcons_ = $fieldIcons;

        return $this;
    }

    /**
     * Get the value of visibilityCriterias_
     */
    public function getVisibilityCriterias()
    {
        return $this->visibilityCriterias_;
    }

    /**
     * Set the value of visibilityCriterias_
     *
     * @return  self
     */
    public function setVisibilityCriterias($visibilityCriterias)
    {
        $this->visibilityCriterias_ = $visibilityCriterias;

        return $this;
    }

    public function addVisibilityCriteria($criteriaType, $criteriaValue)
    {
        $this->visibilityCriterias_[$criteriaType] = $criteriaValue;
        return $this;
    }

    public function addValidationCriteria($criteriaType, $criteriaValue)
    {
        $this->validationCriterias_[$criteriaType] = $criteriaValue;
        return $this;
    }

    public function addSucceedingPartial($partial)
    {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->succeedingPartials_[] = $partial;
            return $this;
        }
        $this->succeedingPartials_[] = ["source" => $partial];
        return $this;
    }

    public function addPrecedingPartial($partial)
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
    public function getFieldValue()
    {
        return $this->fieldValue_;
    }

    /**
     * Set the value of fieldValue_
     *
     * @return  self
     */
    public function setFieldValue($fieldValue)
    {
        $this->fieldValue_ = $fieldValue;

        return $this;
    }

    /**
     * Get the value of validationCriterias_
     */
    public function getValidationCriterias()
    {
        return $this->validationCriterias_;
    }

    /**
     * Set the value of validationCriterias_
     *
     * @return  self
     */
    public function setValidationCriterias($validationCriterias)
    {
        $this->validationCriterias_ = $validationCriterias;

        return $this;
    }

    public function getValidationCriteria($criteria)
    {
        return $this->validationCriterias_[$criteria] ?? null;
    }

    /**
     * Get the value of optionValueColumn_
     */ 
    public function getOptionValueColumn()
    {
        return $this->optionValueColumn_;
    }

    /**
     * Set the value of optionValueColumn_
     *
     * @return  self
     */ 
    public function setOptionValueColumn($optionValueColumn)
    {
        $this->optionValueColumn_ = $optionValueColumn;

        return $this;
    }

    /**
     * Get the value of optionLabelColumn_
     */ 
    public function getOptionLabelColumn()
    {
        return $this->optionLabelColumn_;
    }

    /**
     * Set the value of optionLabelColumn_
     *
     * @return  self
     */ 
    public function setOptionLabelColumn($optionLabelColumn)
    {
        $this->optionLabelColumn_ = $optionLabelColumn;

        return $this;
    }
}
