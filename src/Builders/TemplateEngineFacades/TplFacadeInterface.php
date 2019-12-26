<?php

namespace CookiesRevenge\NovoForm\Builders\TemplateEngineFacades;

interface TplFacadeInterface
{
    public function AssignVariable($varName, $varValue);
    public function AssignVariables($variables);
    public function IsCachingOn(bool $isCachingOn);
    public function IsDebuggingOn(bool $isDebuggingOn);
    public function SetTemplateDir($templateDir);
    public function SetCacheDir($cacheDir);

    public function ConstructEngineObject();

    public function BuildForm();
    public function BuildStaticForm();
}
