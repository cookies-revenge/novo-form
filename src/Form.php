<?php
namespace CookiesRevenge\NovoForm;

use function Opis\Closure\{serialize as super_serialize, unserialize as super_unserialize};

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
            $formControl->SetType($controlDefinition["type"])
                ->SetName($controlDefinition["name"])
                ->SetHtmlClass($controlDefinition["html_class"])
                ->SetIcon($controlDefinition["icon"])
                ->SetAvailability($controlDefinition["availability"])
                ->SetTitle($controlDefinition["title"])
                ->SetDescription($controlDefinition["description"]);
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
        return super_unserialize($serializedForm);
    }

    public function Serialize() 
    {
        return super_serialize($this);
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
            case "timestamp":
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
        $formField->SetType($fieldDefinition["type"])
            ->SetName($fieldDefinition["name"])

            // availability mode
            ->SetAvailability($fieldDefinition["availability"])

            // labels & descriptions
            ->SetLabel($fieldDefinition["label"])
            ->SetDescription($fieldDefinition["description"])
            ->SetPlaceholder($fieldDefinition["placeholder"])

            // partials
            ->SetPrecedingPartials($fieldDefinition["preceding_partial"] ?? [])
            ->SetSucceedingPartials($fieldDefinition["succeeding_partial"] ?? [])

            // html attributes, classes & similar definitions
            ->SetHtmlClass($fieldDefinition["html_class"])
            ->SetReadonly($fieldDefinition["readonly"])
            ->SetFormat($fieldDefinition["format"])
            ->SetSize($fieldDefinition["size"])
            ->SetResizable($fieldDefinition["resizable"])
            ->SetMultipleChoice($fieldDefinition["multiple_choice"])
            ->SetAcceptTypes($fieldDefinition["accept_types"])

            // dynamic load definitions
            ->SetPreloaded($fieldDefinition["preloaded"])
            ->SetSourceUrl($fieldDefinition["source_url"])

            // option config: id/value & label
            ->SetOptionValueColumn($fieldDefinition["option_value_column"])
            ->SetOptionLabelColumn($fieldDefinition["option_label_column"]);

        if (isset($fieldDefinition["icon"]) && $fieldDefinition["icon"] !== null) {
            $formField->SetFieldIcons([$fieldDefinition["icon"]]);
        }

        $formField->SetValidationCriterias($fieldDefinition["validation"] ?? []);
    }

    private function buildFormGroup($formField, $fieldDefinition)
    {
        $formField->SetType($fieldDefinition["type"])
            ->SetName($fieldDefinition["name"])
            ->SetLabel($fieldDefinition["label"])
            ->SetDescription($fieldDefinition["description"])
            ->SetPrecedingPartials($fieldDefinition["preceding_partial"] ?? [])
            ->SetSucceedingPartials($fieldDefinition["succeeding_partial"] ?? [])
            ->SetHtmlClass($fieldDefinition["html_class"]);
        
        foreach ($fieldDefinition["field_definitions"] as $subfieldDef) {
            $subfieldObj = $this->initFormField($subfieldDef);
            $this->buildFormField($subfieldObj, $subfieldDef);
            $formField->AppendSubfield($subfieldObj);
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
        $_SESSION["NovoForms"][$this->guid_] = $this->Serialize();

        return $formHtml;
    }

    public function ToValues()
    {
        $return = [];
        $this->toValueRecursive($this, $return);
        return $return;
    }

    public function ToEntity($orm = null, $id = null)
    {
        $entityBuilder = new \CookiesRevenge\NovoForm\Entities\EntityBuilder($orm ?? $this->orm_, $this->className_, $id);
        $entity = $entityBuilder->Build();
        foreach ($this->ToValues() as $name => $value) {
            $entity->SetPropertyByName($name, $value);
        }
        return $entity;
    }

    public function ListFields()
    {
        return $this->fieldObjects_;
    }

    private function toValueRecursive($parent, &$return)
    {
        foreach ($parent->listFields() as $fieldKey => $fieldObj) {

            if ($fieldObj->GetType() === "fieldgroup") {
                $this->toValueRecursive($fieldObj, $return);
                continue;
            }

            $processedValue = $fieldObj->ToValue();
            $return[$fieldKey] = $processedValue;
        }

        return $return;
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
        if (isset($this->fieldObjects_[$fieldName]))
            return $this->fieldObjects_[$fieldName];
        
        foreach ($this->GetFieldsByType("fieldgroup") as $group) {
            return $group->GetSubfieldByName($fieldName);
        }
    }

    public function GetFieldsByType($fieldType)
    {
        $fields = [];
        foreach ($this->fieldObjects_ as $fieldObj) {
            if ($fieldObj->GetType() === $fieldType) {
                $fields[] = $fieldObj;
            }

        }
        return $fields;
    }

    public function GetFieldsByNotType($fieldType)
    {
        $fields = [];
        foreach ($this->fieldObjects_ as $fieldObj) {
            if ($fieldObj->GetType() !== $fieldType) {
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

        $this->fieldObjects_ = [$fieldObj->GetName() => $fieldObj] + $this->fieldObjects_;
    }

    public function AppendField($fieldObj)
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_[$fieldObj->GetName()] = $fieldObj;
    }

    public function AddFieldBefore($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_ = array_slice($this->fieldObjects_, 0, array_search($name, array_keys($this->fieldObjects_)), true)
            + [$fieldObj->GetName() => $fieldObj]
            + array_slice($this->fieldObjects_, array_search($name, array_keys($this->fieldObjects_)), count($this->fieldObjects_), true);
    }

    public function AddFieldAfter($name, $fieldObj) 
    {
        if (!($fieldObj instanceof \CookiesRevenge\NovoForm\Fields\AbstractFormField)) {
            throw new \Exception("Invalid Field appended in " . __CLASS__ . "::" . __FUNCTION__);
        }

        $this->fieldObjects_ = array_slice($this->fieldObjects_, 0, array_search($name, array_keys($this->fieldObjects_)) + 1, true)
            + [$fieldObj->GetName() => $fieldObj]
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
    private $orm_ = "propel";

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
    public function GetPrecedingPartials()
    {
        return $this->precedingPartials_;
    }

    /**
     * Set the value of precedingPartials_
     *
     * @return  self
     */
    public function SetPrecedingPartials($precedingPartials)
    {
        $this->precedingPartials_ = $precedingPartials;

        return $this;
    }

    public function AddPrecedingPartial($partial)
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
    public function GetSucceedingPartials()
    {
        return $this->succeedingPartials_;
    }

    /**
     * Set the value of succeedingPartials_
     *
     * @return  self
     */
    public function SetSucceedingPartials($succeedingPartials)
    {
        $this->succeedingPartials_ = $succeedingPartials;

        return $this;
    }

    public function AddSucceedingPartial($partial)
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
    public function GetEntity()
    {
        return $this->entity_;
    }

    /**
     * Set the value of entity_
     *
     * @return  self
     */
    public function SetEntity($entity)
    {
        $this->entity_ = $entity;

        return $this;
    }

    /**
     * Get the value of className_
     */
    public function GetClassName()
    {
        return $this->className_;
    }

    /**
     * Set the value of className_
     *
     * @return  self
     */
    public function SetClassName($className)
    {
        $this->className_ = $className;

        return $this;
    }

    /**
     * Get the value of actionUri_
     */
    public function GetActionUri()
    {
        return $this->actionUri_;
    }

    /**
     * Set the value of actionUri_
     *
     * @return  self
     */
    public function SetActionUri($actionUri)
    {
        $this->actionUri_ = $actionUri;

        return $this;
    }

    /**
     * Get the value of successUri_
     */
    public function GetSuccessUri()
    {
        return $this->successUri_;
    }

    /**
     * Set the value of successUri_
     *
     * @return  self
     */
    public function SetSuccessUri($successUri)
    {
        $this->successUri_ = $successUri;

        return $this;
    }

    /**
     * Get the value of failureUri_
     */
    public function GetFailureUri()
    {
        return $this->failureUri_;
    }

    /**
     * Set the value of failureUri_
     *
     * @return  self
     */
    public function SetFailureUri($failureUri)
    {
        $this->failureUri_ = $failureUri;

        return $this;
    }

    /**
     * Get the value of title_
     */
    public function GetTitle()
    {
        return $this->title_;
    }

    /**
     * Set the value of title_
     *
     * @return  self
     */
    public function SetTitle($title)
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
    public function GetFormType()
    {
        return $this->formType_;
    }

    /**
     * Set the value of formType_
     *
     * @return  self
     */
    public function SetFormType($formType)
    {
        $this->formType_ = $formType;

        return $this;
    }

    /**
     * Get the value of controlObjects_
     */
    public function GetControlObjects()
    {
        return $this->controlObjects_;
    }

    /**
     * Set the value of controlObjects_
     *
     * @return  self
     */
    public function SetControlObjects($controlObjects)
    {
        $this->controlObjects_ = $controlObjects;

        return $this;
    }

    /**
     * Get the value of displayDoubleControls_
     */
    public function GetDisplayDoubleControls()
    {
        return $this->displayDoubleControls_;
    }

    /**
     * Set the value of displayDoubleControls_
     *
     * @return  self
     */
    public function SetDisplayDoubleControls($displayDoubleControls)
    {
        $this->displayDoubleControls_ = $displayDoubleControls;

        return $this;
    }

    /**
     * Get /*
     */
    public function GetFieldObjects()
    {
        return $this->fieldObjects_;
    }

    /**
     * Set /*
     *
     * @return  self
     */
    public function SetFieldObjects($fieldObjects)
    {
        $this->fieldObjects_ = $fieldObjects;

        return $this;
    }

    /**
     * Get the value of dataset_
     */
    public function GetDataset()
    {
        return $this->dataset_;
    }

    /**
     * Set the value of dataset_
     *
     * @return  self
     */
    public function SetDataset($dataset)
    {
        $this->dataset_ = $dataset;

        return $this;
    }

    public function SetRecord($entityObject)
    {
        $this->dataset_["record"] = $entityObject;
    }

    public function SetFieldItems($name, $collection)
    {
        $this->dataset_["fieldDatasets"][$name] = $collection;
    }

    public function SetFieldPresetValue($name, $presetValue)
    {
        $this->dataset_["presets"][$name] = $presetValue;
    }

    /**
     * Get the value of guid_
     */ 
    public function GetGuid()
    {
        return $this->guid_;
    }

    /**
     * Set the value of guid_
     *
     * @return  self
     */ 
    public function SetGuid($guid)
    {
        $this->guid_ = $guid;

        return $this;
    }
}
