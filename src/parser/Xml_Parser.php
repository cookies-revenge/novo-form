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
        $this->metadata_["title"] = (string) $this->xml_->title ?? "Untitled Form";
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
        foreach ($this->xml_->fields->children() as $field) {
            
            if ($field->getName() === "fieldgroup") {
                $fieldDefinition = [
                    "type" => "fieldgroup",
                    "label" => [
                        "text" => (string) $field->label ?? null,
                        "html_class" => (string) $field->label["html_class"] ?? null
                    ],
                    "description" => [
                        "text" => (string) $field->description ?? null,
                        "html_class" => (string) $field->description["html_class"] ?? null
                    ]
                ];
                foreach ($field->preceding_partial as $preceding) {
                    $fieldDefinition["preceding_partial"][] = ["source" => (string) $preceding["source"] ?? null];
                }
                foreach ($field->succeeding_partial as $succeeding) {
                    $fieldDefinition["succeeding_partial"][] = ["source" => (string) $succeeding["source"] ?? null];
                }
                foreach ($field->children() as $subfield) {
                    if ($subfield->getName() !== "field")
                        continue;
                    $fieldDefinition["field_definitions"][] = $this->processFieldTagDefinitions($subfield);
                }
                //var_dump($fieldDefinition);
                $this->metadata_["field_definitions"][] = $fieldDefinition;
                continue;
            }
            $this->metadata_["field_definitions"][] = $this->processFieldTagDefinitions($field);
        }
        return $this->metadata_;
    }

    private function processFieldTagDefinitions($field) 
    {
        $fieldDefinition = [
            "type" => (string) $field["type"] ?? null,
            "name" => (string) $field["name"] ?? null,
            "placeholder" => (string) $field->placeholder ?? null,
            "label" => [
                "text" => (string) $field->label ?? null,
                "html_class" => (string) $field->label["html_class"] ?? null
            ],
            "description" => [
                "text" => (string) $field->description ?? null,
                "html_class" => (string) $field->description["html_class"] ?? null
            ],
            "readonly" => filter_var((string) $field["readonly"] ?? false, FILTER_VALIDATE_BOOLEAN),
            "html_class" => (string) $field["html_class"] ?? null,
            "availability" => (string) $field["availability"] ?? "*",
            "format" => (string) $field["format"] ?? null,
            "sizing" => (string) $field["sizing"] ?? null,
            "resizable" => (string) $field["resizable"] ?? true,
            "source_url" => (string) $field["source_url"] ?? null,
            "preloaded" => (string) $field["preloaded"] ?? true,
            "multiple_choice" => (string) $field["multiple_choice"] ?? null
        ];
        foreach ($field->preceding_partial as $preceding) {
            $fieldDefinition["preceding_partial"][] = ["source" => (string) $preceding["source"] ?? null];
        }
        foreach ($field->succeeding_partial as $succeeding) {
            $fieldDefinition["succeeding_partial"][] = ["source" => (string) $succeeding["source"] ?? null];
        }
        $fieldDefinition["validation"] = [];
        if (isset($field->validation)) {
            foreach ($field->validation->attributes() as $validationType => $validationValue) {
                $fieldDefinition["validation"][$validationType] = (string) $validationValue;
            }
        }
        if (isset($field->icon)) {
            $iconDefinition = [
                "position" => (string) $field->icon["position"] ?? "L",
                "html_class" => (string) $field->icon["html_class"] ?? null,
                "description" => (string) $field->icon->description ?? null
            ];
            $fieldDefinition["icon"] = $iconDefinition;
        }
        return $fieldDefinition;
    }

    protected $xml_ = null;
    protected $definitionsXml_ = null;

    protected $metadata_ = [];
}
