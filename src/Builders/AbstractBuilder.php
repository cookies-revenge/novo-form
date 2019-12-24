<?php

namespace CookiesRevenge\NovoForm\Builders;

abstract class AbstractBuilder
{

    abstract public function BuildForm();

    public function SetTemplatingEngine($templatingEngine)
    {
        switch ($templatingEngine) {
            case "smarty":
                $this->templatingEngine_ = new \CookiesRevenge\NovoForm\Builders\TemplateEngineFacades\SmartyTplFacade();
                break;
            default:
                throw new \Exception("Template engine is either invalid or unsupported.");
        }
        return $this;
    }


    public function SetDisplayMode($displayMode) {
        $this->displayMode_ = $displayMode;
        return $this;
    }

    /**
     * Inject a definitions map.
     * Map stores meta data about Form (field types, actions, validations...)
     *
     * @param mixed $definitionsMap Map with definitions for form wrapper, controls, validations, fields.
     * @return $this The current object (for fluent API support)
     */
    public function SetDefinitionsMap($definitionsMap)
    {
        $this->definitionsMap_ = $definitionsMap;
        return $this;
    }

    /**
     * Define a data collection for the form.
     * Implicitly calculates $resultsTotal by counting the data collection.
     *
     * @param array<mixed> $dataCollection new value
     * @return $this The current object (for fluent API support)
     */
    public function SetDataCollection($dataCollection)
    {
        $this->dataCollection_ = $dataCollection;
        $this->resultsTotal_ = count($dataCollection);
        return $this;
    }

    /*
     * templating engine
     */
    /** @var mixed */
    protected $templatingEngine_;

    /*
     * definitions map to build upon
     */
    /** @var mixed */
    protected $definitionsMap_;

    /*
     * dataset
     */
    /** @var array */
    protected $dataCollection_ = [];

    protected $displayMode_;
}
