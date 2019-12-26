<?php

namespace CookiesRevenge\NovoForm\Builders;

abstract class AbstractBuilder
{

    abstract public function Build();

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
     * Define a data collection for the form.
     * Implicitly calculates $resultsTotal by counting the data collection.
     *
     * @param array<mixed> $dataCollection new value
     * @return $this The current object (for fluent API support)
     */
    public function SetDataCollection($dataCollection)
    {
        $this->dataCollection_ = $dataCollection;
        return $this;
    }

    protected $templatingEngine_;
    protected $dataCollection_ = [];
    protected $displayMode_;
}
