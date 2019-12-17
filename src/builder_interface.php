<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder;

interface Builder_Interface
{
    /**
     * Defines a templating engine to be used by the FormBuilder.
     * This may be Smarty, Blade, Mustache or any other desired templating engine.
     * 
     * @param string $templatingEngine name of templating engine, lowercase
     * @return $this The current object (for fluent API support)
     */
    public function SetTemplatingEngine($templatingEngine);

    /**
     * Defines a templating engine to be used by the FormBuilder.
     * This may be Smarty, Blade, Mustache or any other desired templating engine.
     * 
     * @return string Fabricated HTML output for Form
     */
    public function BuildForm();

    /**
     * Defines a templating engine to be used by the FormBuilder.
     * This may be Smarty, Blade, Mustache or any other desired templating engine.
     * 
     * @return string Fabricated HTML output for Form Results, to be injected in Form TBODY
     */
    public function BuildFormResults();
}
