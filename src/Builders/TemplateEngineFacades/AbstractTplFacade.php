<?php

namespace CookiesRevenge\NovoForm\Builders\TemplateEngineFacades;

abstract class AbstractTplFacade implements TplFacadeInterface
{

    abstract public function ConstructEngineObject();
    abstract public function BuildForm();
    abstract public function BuildStaticForm();
    abstract public function AssignVariable($varName, $varValue);
    abstract public function AssignVariables($variables);

    public function IsCachingOn(bool $isCachingOn)
    {
        $this->isCachingOn_ = $isCachingOn;
        return $this;
    }

    public function IsDebuggingOn(bool $isDebuggingOn)
    {
        $this->isDebuggingOn_ = $isDebuggingOn;
        return $this;
    }

    public function SetTemplateDir($templateDir)
    {
        $this->templateDir_ = $templateDir;
        return $this;
    }

    public function SetCacheDir($cacheDir)
    {
        $this->cacheDir_ = $cacheDir;
        return $this;
    }

    protected $tplEngineObject_;
    
    protected $templateDir_;
    protected $cacheDir_;
    protected $configDir_;
    protected $isCachingOn_;
    protected $isDebuggingOn_;
}
