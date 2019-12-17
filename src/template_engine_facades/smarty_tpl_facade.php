<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder\Template_Engine_Facades;

class Smarty_Tpl_Facade extends Abstract_Tpl_Facade
{

    public function ConstructEngineObject()
    {
        $root = dirname(__DIR__);
		$this->templateDir_ = $root ."/templates/smarty";
		$this->cacheDir_ = $root ."/templates/smarty_cache";
		
		$this->tplEngineObject_ = new \Smarty();

        $this->tplEngineObject_->setTemplateDir($this->templateDir_);
        $this->tplEngineObject_->setCompileDir($this->cacheDir_);
        $this->tplEngineObject_->setConfigDir($this->configDir_);
        $this->tplEngineObject_->setCacheDir($this->cacheDir_);

        $this->tplEngineObject_->caching = (int) $this->isCachingOn_;
        $this->tplEngineObject_->debugging = $this->isDebuggingOn_;
    }

    public function BuildFormHTML()
    {
        return $this->tplEngineObject_->fetch($this->templateDir_ . "/form.tpl");
    }

    public function AssignVariable($varName, $varValue)
    {
        $this->tplEngineObject_->assign($varName, $varValue);
        return $this;
    }

    public function AssignVariables($variables)
    {
        foreach ($variables as $varName => $varValue) {
            $this->tplEngineObject_->assign($varName, $varValue);
        }
        return $this;
    }

    // these two may be overriden using setters
    // it may be good idea to override cache dir, because of W rights on the server
    protected $templateDir_;
    protected $cacheDir_;

}
