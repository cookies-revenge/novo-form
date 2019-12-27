<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

session_start();

use CookiesRevenge\NovoForm\Form;
use CookiesRevenge\NovoForm\Fields\Custom;

define("APP_PATH", dirname(__DIR__));

// include bootstrap stylesheet on the page
echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">";

$novoFormObject = new Form("./maps/simple_form.xml");

$customField = new Custom();
$customField->setType("custom")
    ->setName("testcustom")
    ->setAvailability("*")
    ->setHtmlClass("js__customfield-test")
    ->setLabel(["text" => "COLOR PICKER", "html_class" => "font-weight-bold"])
    ->setDescription(["text" => "Pick a Hex; will be converted to RGB"])
    ->setPlaceholder("#000000")
    
    ->setFieldTemplate(APP_PATH ."/test/customs/custom_field1.tpl")
    ->SetToValueProcessor(function ($value) {
        return $value + 1001;
    });

$novoFormObject->AddFieldAfter("closing-date", $customField);

$novoFormObject->setFieldItems("selectbox", [
    ["Id" => 1, "Title" => "Custom Option 1"],
    ["Id" => 2, "Title" => "Custom Option 2"],
    ["Id" => 3, "Title" => "Custom Option 3"]
]);
$novoFormObject->setFieldPresetValue("number", 51);
$novoFormObject->setFieldPresetValue("selectbox", 3);
$novoFormObject->setFieldPresetValue("testcustom", "#005595");

echo $novoFormObject->ToHtml();