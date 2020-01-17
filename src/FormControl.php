<?php
namespace CookiesRevenge\NovoForm;

class FormControl {

    public function ToHtml() {
        return $controlHtml;
    }

    public function AddVisibilityCriteria($criteriaType, $criteriaValue) {
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
     * Get the value of icon_
     */ 
    public function GetIcon()
    {
        return $this->icon_;
    }

    /**
     * Set the value of icon_
     *
     * @return  self
     */ 
    public function SetIcon($icon)
    {
        $this->icon_ = $icon;

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
     * Get the value of title_
     */ 
    public function GetTitle()
    {
        return $this->title_;
    }

    /**
     * Set the value of title_
     *
     * @return  self
     */ 
    public function SetTitle($title)
    {
        $this->title_ = $title;

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
        $this->description_ = $description;

        return $this;
    }
}