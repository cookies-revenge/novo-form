<?php

namespace CookiesRevenge\NovoForm\Builders\TemplateEngineFacades;

class SmartyTplFacade extends AbstractTplFacade
{

    public function ConstructEngineObject()
    {
        $root = dirname(__DIR__);
		$this->templateDir_ = $root ."/Templates/Smarty";
		$this->cacheDir_ = $root ."/Templates/SmartyCache";
		
		$this->tplEngineObject_ = new \Smarty();

        $this->tplEngineObject_->setTemplateDir($this->templateDir_);
        $this->tplEngineObject_->setCompileDir($this->cacheDir_);
        $this->tplEngineObject_->setConfigDir($this->configDir_);
        $this->tplEngineObject_->setCacheDir($this->cacheDir_);

        $this->tplEngineObject_->caching = (int) $this->isCachingOn_;
        $this->tplEngineObject_->debugging = $this->isDebuggingOn_;
    }

    public function BuildForm()
    {
        return $this->tplEngineObject_->fetch($this->templateDir_ . "/form.tpl");
    }

    public function BuildStaticForm()
    {
        return $this->tplEngineObject_->fetch($this->templateDir_ . "/static_form.tpl");
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
