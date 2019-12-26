<?php
namespace CookiesRevenge\NovoForm;

class FormControl {

    public function ToHtml() {
        return $controlHtml;
    }

    public function addVisibilityCriteria($criteriaType, $criteriaValue) {
        $this->visibilityCriterias_[$criteriaType] = $criteriaValue;
    }

    private $type_ = "button";
    private $name_ = null;
    private $htmlClass_ = null;
    private $icon_ = null;
    private $availability_ = "*";
    private $title_ = null;
    private $description_ = null;
    
    private $visibilityCriterias_ = [];

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
     * Get the value of icon_
     */ 
    public function getIcon()
    {
        return $this->icon_;
    }

    /**
     * Set the value of icon_
     *
     * @return  self
     */ 
    public function setIcon($icon)
    {
        $this->icon_ = $icon;

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
     * Get the value of title_
     */ 
    public function getTitle()
    {
        return $this->title_;
    }

    /**
     * Set the value of title_
     *
     * @return  self
     */ 
    public function setTitle($title)
    {
        $this->title_ = $title;

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
        $this->description_ = $description;

        return $this;
    }
}