<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

use CookiesRevenge\NovoForm\Form;

session_start();

$novoFormObject = new Form();
$novoFormObject = $novoFormObject->Unserialize($_SESSION["NovoForms"][$_REQUEST["novo-form-identifier"]]);

var_dump($novoFormObject->getFieldByName("testcustom"));