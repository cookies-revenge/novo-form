<?php
namespace CookiesRevenge\NovoForm;

use CookiesRevenge\NovoForm\Builders\FormBuilder;
use CookiesRevenge\NovoForm\Builders\Parsers\XmlParser;

class Form
{

    public function __construct($mapXml)
    {
        if (!file_exists($mapXml)) {
            throw new \Exception("Invalid map supplied in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->mapXml_ = $mapXml;
        $this->mapParser_ = new XmlParser();
        $this->mapParser_->SetDefinitionsXml($mapXml);
    }

    public function ToHtml($templatingEngine = null)
    {
        // convert contents of XML map file to PHP associative array
        $map = $this->mapParser_->Convert();

        $formBuilder = new FormBuilder();
        $formBuilder->SetTemplatingEngine($templatingEngine ?? $this->tplEngine_);
        $formBuilder->SetDefinitionsMap($map);
        $formBuilder->SetDisplayMode(Constants::DISPLAY_MODE_STANDARD);
        $formHtml = $formBuilder->BuildForm();
        return $formHtml;
    }

    public function Validate()
    {
        $return = true;
        foreach ($this->fieldObjects_ as $fieldObj) {
            $return = $return && $fieldObj->Validate();
        }
        return $return;
    }

    public function GetFieldByName($fieldName) {
        return $this->fieldObjects_[$fieldName];
    }

    public function GetFieldsByType($fieldType) {
        $fields = [];
        foreach ($this->fieldObjects_ as $fieldObj) {
            if ($fieldObj->getType() === $fieldType) {
                $fields[] = $fieldObj;
            }

        }
        return $fields;
    }

    public function PrependField($fieldObj)
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field prepended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_ = [$fieldObj->getName() => $fieldObj] + $this->fieldObjects_;
    }

    public function AppendField($fieldObj)
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_[$fieldObj->getName()] = $fieldObj;
    }

    public function RemoveField($fieldKey)
    {
        unset($this->fieldObjects_[$fieldKey]);
    }

    private $mapXml_ = null;
    private $mapParsed_ = [];
    private $mapParser_ = null;
    private $tplEngine_ = "smarty";

    /*
     * Field objects;
     * Pairs in format Field->name => Field
     */
    private $fieldObjects_ = [];
    private $controlObjects_ = [];
}
