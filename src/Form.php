<?php
namespace CookiesRevenge\NovoForm;

use SuperClosure\Serializer;
        use SuperClosure\Analyzer\TokenAnalyzer;

use CookiesRevenge\NovoForm\Builders\FormBuilder;
use CookiesRevenge\NovoForm\Builders\Parsers\XmlParser;

class Form
{

    public function __construct($mapXml = null)
    {

        if ($mapXml === null)
            return; // instantiate empty object

        if (!file_exists($mapXml)) {
            throw new \Exception("Invalid map supplied in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->guid_ = \md5(\rand(0, 10000));

        $this->mapXml_ = $mapXml;
        $this->mapParser_ = new XmlParser();
        $this->mapParser_->SetDefinitionsXml($mapXml);
        $defs = $this->mapParser_->Convert();

        $this->initForm($defs);

        foreach ($defs["control_definitions"] as $controlDefinition) {
            $formControl = new FormControl();
            $formControl->setType($controlDefinition["type"])
                ->setName($controlDefinition["name"])
                ->setHtmlClass($controlDefinition["html_class"])
                ->setIcon($controlDefinition["icon"])
                ->setAvailability($controlDefinition["availability"])
                ->setTitle($controlDefinition["title"])
                ->setDescription($controlDefinition["description"]);
            $this->controlObjects_[$controlDefinition["name"]] = $formControl;
        }

        foreach ($defs["field_definitions"] as $fieldDefinition) {

            $formField = $this->initFormField($fieldDefinition);
            if ($formField === null)
                continue;

            if ($fieldDefinition["type"] === "fieldgroup") {
                $this->buildFormGroup($formField, $fieldDefinition);
            } else {
                $this->buildFormField($formField, $fieldDefinition);
            }

            $this->fieldObjects_[$fieldDefinition["name"]] = $formField;
        }
    }


    public function Unserialize($serializedForm) 
    {
        $serializer = new Serializer(new TokenAnalyzer());
        return $serializer->unserialize($serializedForm);
    }


    private function initForm($defs)
    {
        $this->formType_ = $defs["form_type"];
        $this->title_ = $defs["title"];
        $this->entity_ = $defs["entity"];
        $this->className_ = $defs["class_name"];
        $this->displayDoubleControls_ = $defs["display_double_controls"];
        $this->actionUri_ = $defs["action_uri"];
        $this->successUri_ = $defs["success_uri"];
        $this->failureUri_ = $defs["failure_uri"];
        $this->precedingPartials_ = $defs["preceding_partial"];
        $this->succeedingPartials_ = $defs["succeeding_partial"];
    }


    private function initFormField($fieldDefinition) 
    {
        $formField = null;
        switch ($fieldDefinition["type"]) {
            case "input":
                $formField = new \CookiesRevenge\NovoForm\Fields\Input();
                break;
            case "hidden":
                $formField = new \CookiesRevenge\NovoForm\Fields\Hidden();
                break;
            case "email":
                $formField = new \CookiesRevenge\NovoForm\Fields\Email();
                break;
            case "date":
            case "datepicker":
                $formField = new \CookiesRevenge\NovoForm\Fields\Date();
                break;
            case "url":
            case "link":
                $formField = new \CookiesRevenge\NovoForm\Fields\Url();
                break;
            case "password":
                $formField = new \CookiesRevenge\NovoForm\Fields\Password();
                break;
            case "numeric":
            case "number":
                $formField = new \CookiesRevenge\NovoForm\Fields\Numeric();
                break;
            case "file":
                $formField = new \CookiesRevenge\NovoForm\Fields\File();
                break;
            case "textarea":
                $formField = new \CookiesRevenge\NovoForm\Fields\Textarea();
                break;
            case "richtext":
                $formField = new \CookiesRevenge\NovoForm\Fields\Richtext();
                break;
            case "select":
                $formField = new \CookiesRevenge\NovoForm\Fields\Select();
                break;
            case "dropdown":
                $formField = new \CookiesRevenge\NovoForm\Fields\Dropdown();
                break;
            case "checkbox":
                $formField = new \CookiesRevenge\NovoForm\Fields\Checkbox();
                break;
            case "fieldgroup":
                $formField = new \CookiesRevenge\NovoForm\Fields\FieldGroup();
                break;
            default:break;
        }

        return $formField;
    }

    private function buildFormField($formField, $fieldDefinition)
    {
        $formField->setType($fieldDefinition["type"])
            ->setName($fieldDefinition["name"])

            // availability mode
            ->setAvailability($fieldDefinition["availability"])

            // labels & descriptions
            ->setLabel($fieldDefinition["label"])
            ->setDescription($fieldDefinition["description"])
            ->setPlaceholder($fieldDefinition["placeholder"])

            // partials
            ->setPrecedingPartials($fieldDefinition["preceding_partial"] ?? [])
            ->setSucceedingPartials($fieldDefinition["succeeding_partial"] ?? [])

            // html attributes, classes & similar definitions
            ->setHtmlClass($fieldDefinition["html_class"])
            ->setReadonly($fieldDefinition["readonly"])
            ->setFormat($fieldDefinition["format"])
            ->setSize($fieldDefinition["size"])
            ->setResizable($fieldDefinition["resizable"])
            ->setMultipleChoice($fieldDefinition["multiple_choice"])
            ->setAcceptTypes($fieldDefinition["accept_types"])

            // dynamic load definitions
            ->setPreloaded($fieldDefinition["preloaded"])
            ->setSourceUrl($fieldDefinition["source_url"])

            // option config: id/value & label
            ->setOptionValueColumn($fieldDefinition["option_value_column"])
            ->setOptionLabelColumn($fieldDefinition["option_label_column"]);

        if (isset($fieldDefinition["icon"]) && $fieldDefinition["icon"] !== null) {
            $formField->setFieldIcons([$fieldDefinition["icon"]]);
        }

        $formField->setValidationCriterias($fieldDefinition["validation"] ?? []);
    }

    private function buildFormGroup($formField, $fieldDefinition)
    {
        $formField->setType($fieldDefinition["type"])
            ->setName($fieldDefinition["name"])
            ->setLabel($fieldDefinition["label"])
            ->setDescription($fieldDefinition["description"])
            ->setPrecedingPartials($fieldDefinition["preceding_partial"] ?? [])
            ->setSucceedingPartials($fieldDefinition["succeeding_partial"] ?? [])
            ->setHtmlClass($fieldDefinition["html_class"]);
        
        foreach ($fieldDefinition["field_definitions"] as $subfieldDef) {
            $subfieldObj = $this->initFormField($subfieldDef);
            $this->buildFormField($subfieldObj, $subfieldDef);
            $formField->appendSubfield($subfieldObj);
        }
    }

    public function ToHtml($templatingEngine = null)
    {
        // convert contents of XML map file to PHP associative array
        $map = $this->mapParser_->Convert();
        $this->mapParser_ = null; // nullify because of later serialization

        $formBuilder = new FormBuilder();
        $formBuilder->SetTemplatingEngine($templatingEngine ?? $this->tplEngine_);
        $formBuilder->SetForm($this);
        $formBuilder->SetDataCollection($this->dataset_);
        $formHtml = $formBuilder->Build();

        // serialize form to session
        // will preserve dynamic types, custom types & their processors etc...
        $_SESSION["NovoForms"][$this->guid_] = serialize($this);

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

    public function GetFieldByName($fieldName)
    {
        return $this->fieldObjects_[$fieldName];
    }

    public function GetFieldsByType($fieldType)
    {
        $fields = [];
        foreach ($this->fieldObjects_ as $fieldObj) {
            if ($fieldObj->getType() === $fieldType) {
                $fields[] = $fieldObj;
            }

        }
        return $fields;
    }

    public function GetFieldsByNotType($fieldType)
    {
        $fields = [];
        foreach ($this->fieldObjects_ as $fieldObj) {
            if ($fieldObj->getType() !== $fieldType) {
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

    public function AddFieldBefore($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_ = array_slice($this->fieldObjects_, 0, array_search($name, array_keys($this->fieldObjects_)), true)
            + [$fieldObj->getName() => $fieldObj]
            + array_slice($this->fieldObjects_, array_search($name, array_keys($this->fieldObjects_)), count($this->fieldObjects_), true);
    }

    public function AddFieldAfter($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_ = array_slice($this->fieldObjects_, 0, array_search($name, array_keys($this->fieldObjects_)) + 1, true)
            + [$fieldObj->getName() => $fieldObj]
            + array_slice($this->fieldObjects_, array_search($name, array_keys($this->fieldObjects_)) + 1, count($this->fieldObjects_), true);
    }

    public function RemoveField($fieldKey)
    {
        unset($this->fieldObjects_[$fieldKey]);
    }

    private $guid_ = null;
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
    private $dataset_ = [
        "record" => null,
        "presets" => [],
        "fieldDatasets" => [],
    ];

    private $formType_;

    private $entity_ = null;
    private $className_ = null;
    private $actionUri_ = null;
    private $successUri_ = null;
    private $failureUri_ = null;
    private $title_ = null;
    private $displayDoubleControls_ = false;

    protected $precedingPartials_ = [];
    protected $succeedingPartials_ = [];

    /**
     * Get the value of precedingPartials_
     */
    public function getPrecedingPartials()
    {
        return $this->precedingPartials_;
    }

    /**
     * Set the value of precedingPartials_
     *
     * @return  self
     */
    public function setPrecedingPartials($precedingPartials)
    {
        $this->precedingPartials_ = $precedingPartials;

        return $this;
    }

    public function addPrecedingPartial($partial)
    {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->precedingPartials_[] = $partial;
            return $this;
        }
        $this->precedingPartials_[] = ["source" => $partial];
        return $this;
    }

    /**
     * Get the value of succeedingPartials_
     */
    public function getSucceedingPartials()
    {
        return $this->succeedingPartials_;
    }

    /**
     * Set the value of succeedingPartials_
     *
     * @return  self
     */
    public function setSucceedingPartials($succeedingPartials)
    {
        $this->succeedingPartials_ = $succeedingPartials;

        return $this;
    }

    public function addSucceedingPartial($partial)
    {
        if (\is_array($partial) && array_key_exists("source", $partial)) {
            $this->succeedingPartials_[] = $partial;
            return $this;
        }
        $this->succeedingPartials_[] = ["source" => $partial];
        return $this;
    }

    /**
     * Get the value of entity_
     */
    public function getEntity()
    {
        return $this->entity_;
    }

    /**
     * Set the value of entity_
     *
     * @return  self
     */
    public function setEntity($entity)
    {
        $this->entity_ = $entity;

        return $this;
    }

    /**
     * Get the value of className_
     */
    public function getClassName()
    {
        return $this->className_;
    }

    /**
     * Set the value of className_
     *
     * @return  self
     */
    public function setClassName($className)
    {
        $this->className_ = $className;

        return $this;
    }

    /**
     * Get the value of actionUri_
     */
    public function getActionUri()
    {
        return $this->actionUri_;
    }

    /**
     * Set the value of actionUri_
     *
     * @return  self
     */
    public function setActionUri($actionUri)
    {
        $this->actionUri_ = $actionUri;

        return $this;
    }

    /**
     * Get the value of successUri_
     */
    public function getSuccessUri()
    {
        return $this->successUri_;
    }

    /**
     * Set the value of successUri_
     *
     * @return  self
     */
    public function setSuccessUri($successUri)
    {
        $this->successUri_ = $successUri;

        return $this;
    }

    /**
     * Get the value of failureUri_
     */
    public function getFailureUri()
    {
        return $this->failureUri_;
    }

    /**
     * Set the value of failureUri_
     *
     * @return  self
     */
    public function setFailureUri($failureUri)
    {
        $this->failureUri_ = $failureUri;

        return $this;
    }

    /**
     * Get the value of title_
     */
    public function getTitle()
    {
        return $this->title_;
    }

    /**
     * Set the value of title_
     *
     * @return  self
     */
    public function setTitle($title)
    {
        if (\is_array($title) && array_key_exists("text", $title)) {
            $this->title_ = $title;
            return $this;
        }
        $this->title_ = ["text" => $title, "html_class" => null, "type" => "h1"];
        return $this;
    }

    /**
     * Get the value of formType_
     */
    public function getFormType()
    {
        return $this->formType_;
    }

    /**
     * Set the value of formType_
     *
     * @return  self
     */
    public function setFormType($formType)
    {
        $this->formType_ = $formType;

        return $this;
    }

    /**
     * Get the value of controlObjects_
     */
    public function getControlObjects()
    {
        return $this->controlObjects_;
    }

    /**
     * Set the value of controlObjects_
     *
     * @return  self
     */
    public function setControlObjects($controlObjects)
    {
        $this->controlObjects_ = $controlObjects;

        return $this;
    }

    /**
     * Get the value of displayDoubleControls_
     */
    public function getDisplayDoubleControls()
    {
        return $this->displayDoubleControls_;
    }

    /**
     * Set the value of displayDoubleControls_
     *
     * @return  self
     */
    public function setDisplayDoubleControls($displayDoubleControls)
    {
        $this->displayDoubleControls_ = $displayDoubleControls;

        return $this;
    }

    /**
     * Get /*
     */
    public function getFieldObjects()
    {
        return $this->fieldObjects_;
    }

    /**
     * Set /*
     *
     * @return  self
     */
    public function setFieldObjects($fieldObjects)
    {
        $this->fieldObjects_ = $fieldObjects;

        return $this;
    }

    /**
     * Get the value of dataset_
     */
    public function getDataset()
    {
        return $this->dataset_;
    }

    /**
     * Set the value of dataset_
     *
     * @return  self
     */
    public function setDataset($dataset)
    {
        $this->dataset_ = $dataset;

        return $this;
    }

    public function setRecord($entityObject)
    {
        $this->dataset_["record"] = $entityObject;
    }

    public function setFieldItems($name, $collection)
    {
        $this->dataset_["fieldDatasets"][$name] = $collection;
    }

    public function setFieldPresetValue($name, $presetValue)
    {
        $this->dataset_["presets"][$name] = $presetValue;
    }

    /**
     * Get the value of guid_
     */ 
    public function getGuid()
    {
        return $this->guid_;
    }

    /**
     * Set the value of guid_
     *
     * @return  self
     */ 
    public function setGuid($guid)
    {
        $this->guid_ = $guid;

        return $this;
    }
}
