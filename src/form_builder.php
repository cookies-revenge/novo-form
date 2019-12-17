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
            ->AssignVariable("class_name", $this->definitionsMap_["class_name"])

            ->AssignVariable("type", $this->definitionsMap_["type"])

            ->AssignVariable("preceeding_partial", $this->definitionsMap_["preceeding_partial"])
            ->AssignVariable("suceeding_partial", $this->definitionsMap_["suceeding_partial"])

            ->AssignVariable("record", $this->dataCollection_["record"])
            ->AssignVariable("presets", $this->dataCollection_["presets"])

            ->AssignVariable("actions", $this->definitionsMap_["actions"])
            ->AssignVariable("field_definitions", $this->definitionsMap_["fields"]);
    }
}