<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

use CookiesRevenge\Novo\Utilities\NovoFormBuilder\Form_Builder;
use CookiesRevenge\Novo\Utilities\NovoFormBuilder\Parser\Xml_Parser;

define("APP_PATH", dirname(__DIR__));

$xmlParser = new Xml_Parser();
$xmlParser->SetDefinitionsXml("./maps/simple_form.xml");
$map = $xmlParser->Convert();

$formBuilder = new Form_Builder();
$formBuilder->SetTemplatingEngine("smarty");
$formBuilder->SetDefinitionsMap($map);
$formBuilder->SetDisplayMode(\CookiesRevenge\Novo\Utilities\NovoFormBuilder\Form_Builder_Constants::NOVO_FORM_DISPLAY_MODE_STANDARD);
$formHtml = $formBuilder->BuildForm();

echo $formHtml;