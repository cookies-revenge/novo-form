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
    
    $fieldObj = $novoFormObject->GetFieldByName($reqName);
    if ($fieldObj === null) // this should never really happen, but still handle this case carefully
        continue;
    $fieldObj->SetFieldValue($reqValue);
}

$tstamp = time();
$entity = $novoFormObject->ToEntity();

if ($entity->GetPropertyByName("Id") === null)
    // set crdate only if new entity
    $entity->SetPropertyByName("Crdate", $tstamp);
    
$entity->SetPropertyByName("Tstamp", $tstamp);
$entity->Save();

unset($_SESSION["NovoForms"][$_REQUEST["novo-form-identifier"]]);

header("Location: /test/book_form.php?ID=". $entity->GetObject()->getId() ."&SUCCESS");