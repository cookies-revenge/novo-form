<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder;

class Form_Builder extends Abstract_Builder
{

    public function BuildForm() {
        $this->templatingEngine_->ConstructEngineObject();
        $this->assignFormMetadata();
        return $this->templatingEngine_->BuildFormHTML();
    }

    private function assignFormMetadata() {
        $this->templatingEngine_
            ->AssignVariable("title", $this->definitionsMap_["title"])
            ->AssignVariable("entity", $this->definitionsMap_["entity"])
            ->AssignVariable("action_uri", $this->definitionsMap_["action_uri"])
            ->AssignVariable("class_name", $this->definitionsMap_["class_name"])

            ->AssignVariable("form_type", $this->definitionsMap_["form_type"] ?? "standard")
            ->AssignVariable("display_mode", $this->definitionsMap_["display_mode"])

            ->AssignVariable("preceeding_partial", $this->definitionsMap_["preceeding_partial"])
            ->AssignVariable("suceeding_partial", $this->definitionsMap_["suceeding_partial"])

            ->AssignVariable("record", $this->dataCollection_["record"])
            ->AssignVariable("presets", $this->dataCollection_["presets"])

            ->AssignVariable("field_definitions", $this->definitionsMap_["fields"])
            ->AssignVariable("control_definitions", $this->definitionsMap_["controls"])
            ->AssignVariable("show_double_controls", $this->definitionsMap_["show_double_controls"] ?? false);
    }
}