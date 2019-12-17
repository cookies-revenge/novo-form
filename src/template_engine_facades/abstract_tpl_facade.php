<?php

namespace CookiesRevenge\Novo\Utilities\NovoTableBuilder\Template_Engine_Facades;

abstract class Abstract_Tpl_Facade implements Tpl_Facade_Interface
{

    abstract public function ConstructEngineObject();
    abstract public function BuildTableHTML($resultsOnly);
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
