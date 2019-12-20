<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder\Parser;

class Xml_Parser
{

    public function SetDefinitionsXml($definitionsXml)
    {
        $this->definitionsXml_ = $definitionsXml;
        $this->xml_ = simplexml_load_file($this->definitionsXml_) or die("Could not load Definitions File in " . __CLASS__ . "::" . __FUNCTION__);
        return $this;
    }

    public function Convert()
    {
        $this->metadata_["entity"] = (string) $this->xml_["entity"] ?? null;
        $this->metadata_["class_name"] = (string) $this->xml_["class_name"] ?? null;
        $this->metadata_["action_uri"] = (string) $this->xml_["action_uri"] ?? null;
        $this->metadata_["title"] = $this->xml_->title->value ?? "Untitled Form";
        $this->metadata_["display_double_controls"] = filter_var((string) $this->xml_["display_double_controls"], FILTER_VALIDATE_BOOLEAN) ?? false;

        $this->metadata_["preceding_partial"] = [];
        foreach ($this->xml_->preceding_partial as $preceding) {
            $this->metadata_["preceding_partial"][] = ["source" => (string) $preceding["source"] ?? null];
        }

        $this->metadata_["succeeding_partial"] = [];
        foreach ($this->xml_->succeeding_partial as $succeeding) {
            $this->metadata_["succeeding_partial"][] = ["source" => (string) $succeeding["source"] ?? null];
        }

        $this->metadata_["control_definitions"] = [];
        foreach ($this->xml_->controls as $controls) {
            foreach ($controls as $control) {
                $this->metadata_["control_definitions"][] = [
                    "type" => (string) $control["type"] ?? "button",
                    "display_mode" => (string) $control["display_mode"] ?? "STANDARD",
                    "html_class" => (string) $control["html_class"] ?? null,
                    "icon" => (string) $control["icon"] ?? null,
                    "availability" => (string) $control["availability"] ?? "*",
                    "title" => (string) $control->title ?? "Untitled Control",
                    "description" => (string) $control->description ?? "N/A Control",
                ];
            }
        }

        $this->metadata_["field_definitions"] = [];

        return $this->metadata_;
    }

    protected $xml_ = null;
    protected $definitionsXml_ = null;

    protected $metadata_ = [];
}
