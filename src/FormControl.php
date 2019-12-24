<?php
namespace CookiesRevenge\NovoForm;

class FormControl {

    public function ToHtml() {
        return $controlHtml;
    }

    public function addVisibilityCriteria($criteriaType, $criteriaValue) {
        $this->visibilityCriterias_[$criteriaType] = $criteriaValue;
    }

    private $type_;
    private $visibilityCriterias_ = [];
}