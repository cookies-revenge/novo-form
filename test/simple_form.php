<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

ini_set("display_errors", 1);
define("APP_PATH", dirname(__DIR__));
session_start();

use CookiesRevenge\NovoForm\Form;
use CookiesRevenge\NovoForm\Fields\Custom;

echo "<head>";
echo "<title>NOVO FORM</title>";
// include bootstrap stylesheet on the page
echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\">";
echo "</head>";

$novoFormObject = new Form("./maps/simple_form.xml");

$customField = new Custom();
$customField->SetType("custom")
    ->SetName("testcustom")
    ->SetAvailability("*")
    ->SetHtmlClass("js__customfield-test")
    ->SetLabel(["text" => "COLOR PICKER", "html_class" => "font-weight-bold"])
    ->SetDescription(["text" => "Pick a Hex; will be converted to RGB"])
    ->SetPlaceholder("#000000")
    ->SetFieldTemplate(APP_PATH ."/test/customs/custom_field1.tpl")
    ->SetToValueProcessor(function ($value) {
        return $value . "TESTTEST";
    });

$novoFormObject->AddFieldAfter("closing-date", $customField);

$novoFormObject->SetFieldItems("selectbox", [
    ["Id" => 1, "Title" => "Custom Option 1"],
    ["Id" => 2, "Title" => "Custom Option 2"],
    ["Id" => 3, "Title" => "Custom Option 3"]
]);
$novoFormObject->SetFieldPresetValue("number", 51);
$novoFormObject->SetFieldPresetValue("selectbox", 3);
$novoFormObject->SetFieldPresetValue("testcustom", "#eb6914");

echo $novoFormObject->ToHtml();