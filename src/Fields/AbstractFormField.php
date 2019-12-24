<?php
namespace CookiesRevenge\NovoForm\Fields;

abstract class AbstractFormField {

    public abstract function ToHtml();

    public function Validate() {
        return true;
    }

    protected $type_;
    protected $name_;
    protected $placeholder_;
    protected $label_;
    protected $description_;
    protected $readonly_;
    protected $htmlClass_;
    protected $availability_;
    protected $format_;
    protected $size_;
    protected $resisable_;
    protected $sourceUrl_;
    protected $preloaded_;
    protected $multipleChoice_;
    protected $acceptTypes_;

    protected $precedingPartials_ = [];
    protected $succeedingPartials_ = [];
    protected $visibilityCriterias_ = [];
    protected $validationCriterias_ = [];
    protected $fieldIcons_ = [];

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
        $this->label_ = ["text" => $label];
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
        $this->description_ = ["text" => $description];
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
     * Get the value of resisable_
     */ 
    public function getResisable()
    {
        return $this->resisable_;
    }

    /**
     * Set the value of resisable_
     *
     * @return  self
     */ 
    public function setResisable($resisable)
    {
        $this->resisable_ = $resisable;

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
        return $this->precedingPartial_;
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



    public function addVisibilityCriteria($criteriaType, $criteriaValue) {
        $this->visibilityCriterias_[$criteriaType] = $criteriaValue;
        return $this;
    }
    
    public function addValidationCriteria($criteriaType, $criteriaValue) {
        $this->validationCriterias_[$criteriaType] = $criteriaValue;
        return $this;
    }

    public function addSucceedingPartial($partial) {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->succeedingPartials_[] = $partial;
            return $this;
        }
        $this->succeedingPartials_[] = ["source" => $partial];
        return $this;
    }

    public function addPrecedingPartial($partial) {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->precedingPartials_[] = $partial;
            return $this;
        }
        $this->precedingPartials_[] = ["source" => $partial];
        return $this;
    }
}