<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

use CookiesRevenge\Novo\Utilities\NovoFormBuilder\Builders\Form_Builder;
use CookiesRevenge\Novo\Utilities\NovoFormBuilder\Builders\Parsers\Xml_Parser;

define("APP_PATH", dirname(__DIR__));

$xmlParser = new Xml_Parser();
$xmlParser->SetDefinitionsXml("./maps/simple_form.xml");
$map = $xmlParser->Convert();

$formBuilder = new Form_Builder();
$formBuilder->SetTemplatingEngine("smarty");
$formBuilder->SetDefinitionsMap($map);
$formBuilder->SetDisplayMode(\CookiesRevenge\Novo\Utilities\NovoFormBuilder\Builders\Form_Builder_Constants::NOVO_FORM_DISPLAY_MODE_STANDARD);
$formHtml = $formBuilder->BuildForm();

echo $formHtml;
echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\" integrity=\"sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh\" crossorigin=\"anonymous\">";