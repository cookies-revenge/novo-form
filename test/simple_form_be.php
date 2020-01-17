<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

ini_set("display_errors", 1);

use CookiesRevenge\NovoForm\Form;

session_start();

$novoFormObject = new Form();
$novoFormObject = $novoFormObject->Unserialize($_SESSION["NovoForms"][$_REQUEST["novo-form-identifier"]]);

foreach ($_REQUEST as $reqName => $reqValue) {

    if ($reqName === "novo-form-identifier")
        continue;
    
    $novoFormObject->GetFieldByName($reqName)->SetFieldValue($reqValue);
}

var_dump($novoFormObject->ToValues());


$tstamp = time();
$book = $novoFormObject->ToEntity();
$book->SetPropertyByName("Crdate", $tstamp);
$book->SetPropertyByName("Tstamp", $tstamp);

var_dump($book->ToArray());

$book->Save();

//unset($_SESSION["NovoForms"][$_REQUEST["novo-form-identifier"]]);