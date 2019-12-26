<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

use CookiesRevenge\NovoForm\Form;

define("APP_PATH", dirname(__DIR__));

// include bootstrap stylesheet on the page
echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">";

$novoFormObject = new Form("./maps/simple_form.xml");
$novoFormObject->setFieldItems("selectbox", [
    ["Id" => 1, "Title" => "Custom Option 1"],
    ["Id" => 2, "Title" => "Custom Option 2"],
    ["Id" => 3, "Title" => "Custom Option 3"]
]);
$novoFormObject->setFieldPresetValue("number", 51);
$novoFormObject->setFieldPresetValue("selectbox", 3);
echo $novoFormObject->ToHtml();