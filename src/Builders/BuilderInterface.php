<?php

namespace CookiesRevenge\NovoForm\Builders;

interface BuilderInterface
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
}
