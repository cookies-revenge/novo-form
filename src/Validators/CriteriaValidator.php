<?php
namespace CookiesRevenge\NovoForm\Validators;

class CriteriaValidator
{
    public function Validate($input, $criteriaName, $criteriaValue)
    {
        if (in_array($criteriaName, $this->validations_)) {
            switch ($criteriaName) {
                case "mandatory":
                    return $this->validateMandatory($input, $criteriaValue);
                case "max-length":
                    return $this->validateMaxLength($input, $criteriaValue);
                case "min-length":
                    return $this->validateMinLength($input, $criteriaValue);
                case "max-length-cleartext":
                    return $this->validateMaxLengthCleartext($input, $criteriaValue);
                case "min-length-cleartext":
                    return $this->validateMinLengthCleartext($input, $criteriaValue);
                case "numeric":
                    return $this->validateNumeric($input, $criteriaValue);
                case "max-value":
                    return $this->validateMaxValue($input, $criteriaValue);
                case "min-value":
                    return $this->validateMinValue($input, $criteriaValue);
                case "in":
                    return $this->validateIn($input, $criteriaValue);
                case "url":
                    return $this->validateURL($input);
                case "email":
                    return $this->validateEmail($input);
                default:return false;
            }
        }
        return false;
    }

    protected function validateMandatory($input, $criteriaValue)
    {
        if ($criteriaValue) {
            return $input != "";
        } else // this means that mandatory is set to false in the map, so whatever the value of the input is, always return true
        {
            return true;
        }

    }

    protected function validateMaxLength($input, $criteriaValue)
    {
        return strlen($input) <= $criteriaValue;
    }

    protected function validateMinLength($input, $criteriaValue)
    {
        return strlen($input) >= $criteriaValue;
    }

    protected function validateMaxLengthCleartext($input, $criteriaValue)
    {
        $input = strip_tags($input);
        $input = html_entity_decode($input, ENT_COMPAT, "UTF-8");
        return strlen($input) <= $criteriaValue;
    }

    protected function validateMinLengthCleartext($input, $criteriaValue)
    {
        $input = strip_tags($input);
        $input = html_entity_decode($input, ENT_COMPAT, "UTF-8");
        return strlen($input) >= $criteriaValue;
    }

    protected function validateNumeric($input, $criteriaValue)
    {
        if ($criteriaValue) // numeric is set to TRUE in the map
        {
            return is_numeric($input) || $input === "";
        } else // numeric is set to FALSE in the map
        {
            return !is_numeric($input) || $input === "";
        }
    }

    protected function validateMaxValue($input, $criteriaValue)
    {
        return is_numeric($input) && $input <= $criteriaValue;
    }

    protected function validateMinValue($input, $criteriaValue)
    {
        return is_numeric($input) && $input >= $criteriaValue;
    }

    protected function validateUrl($input)
    {
        return filter_var($input, FILTER_VALIDATE_URL);
    }

    protected function validateEmail($input)
    {
        return filter_var($input, FILTER_VALIDATE_EMAIL);
    }

    protected function validateIn($input, $criteriaValue)
    {
        return in_array($input, $criteriaValue);
    }

    protected $validations_ = [
        "mandatory",
        "max-length",
        "min-length",
        "min-length-cleartext",
        "max-length-cleartext",
        "numeric",
        "min-value",
        "max-value",
        "in",
        "url",
        "email"];
}
