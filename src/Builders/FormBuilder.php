<?php

namespace CookiesRevenge\NovoForm\Builders;

class FormBuilder extends AbstractBuilder
{

    public function Build() {
        $this->templatingEngine_->ConstructEngineObject();
        $this->assignTplData();
        $form = $this->templatingEngine_->BuildForm();
        return $form;
    }


    public function SetForm($formObject) {
        $this->formObject_ = $formObject;
        return $this;
    }


    private function assignTplData() {
        $this->templatingEngine_->AssignVariable("formObj", $this->formObject_);

        if (!empty($this->dataCollection_)) {
            $this->templatingEngine_->AssignVariable("record", $this->dataCollection_["record"])
                ->AssignVariable("presets", $this->dataCollection_["presets"])
                ->AssignVariable("fieldDatasets", $this->dataCollection_["fieldDatasets"]);
        }
    }

    private $formObject_ = null;
}