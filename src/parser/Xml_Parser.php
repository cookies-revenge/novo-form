<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder\Parser;

class Xml_Parser
{

    public function __construct() {
        
    }

    public function SetDefinitionsXml($definitionsXml)
    {
        $this->definitionsXml_ = $definitionsXml;
        $this->xml_ = simplexml_load_file($this->definitionsXml_)
            or die("Could not load XML File in ". __CLASS__ ." ". __FUNCTION__);
        return $this;
    }

    public function Convert() {
        var_dump($this->xml_);
    }

    protected $xml_ = null;
    protected $definitionsXml_ = null;

    protected $converted_ = [];
}
