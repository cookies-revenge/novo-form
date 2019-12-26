<?php

namespace CookiesRevenge\NovoForm\Builders;

interface BuilderInterface
{
    public function SetTemplatingEngine($templatingEngine);
    public function Build();
}
