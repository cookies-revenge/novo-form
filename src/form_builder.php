<?php

namespace CookiesRevenge\Novo\Utilities\NovoFormBuilder;

class Form_Builder extends Abstract_Builder
{

    public function BuildForm() {
        $this->templatingEngine_->ConstructEngineObject();
        $this->assignFormMetadata();
        $form = "";
        switch ($this->displayMode_) {
            case "STANDARD":
                $form = $this->templatingEngine_->BuildFormHTML();
                break;
            case "STATIC":
                $form = $this->templatingEngine_->BuildStaticFormHTML();
                break;
            default: throw new \Exception("Form DisplayMode (type) not defined in ". __CLASS__ ."::". __FUNCTION__);
        }
        return $form;
    }


    private function assignFormMetadata() {
        $this->templatingEngine_
            ->AssignVariable("title", $this->definitionsMap_["title"])
            ->AssignVariable("entity", $this->definitionsMap_["entity"])
            ->AssignVariable("action_uri", $this->definitionsMap_["action_uri"])
            ->AssignVariable("class_name", $this->definitionsMap_["class_name"])

            ->AssignVariable("form_type", $this->definitionsMap_["form_type"] ?? "standard")

            ->AssignVariable("preceding_partial", $this->definitionsMap_["preceding_partial"])
            ->AssignVariable("succeeding_partial", $this->definitionsMap_["succeeding_partial"])

            ->AssignVariable("field_definitions", $this->definitionsMap_["field_definitions"])
            ->AssignVariable("control_definitions", $this->definitionsMap_["control_definitions"])
            ->AssignVariable("display_double_controls", $this->definitionsMap_["display_double_controls"] ?? false);

        if (!empty($this->dataCollection_)) {
            $this->templatingEngine_->AssignVariable("record", $this->dataCollection_["record"])
                ->AssignVariable("presets", $this->dataCollection_["presets"]);
        }
    }
}