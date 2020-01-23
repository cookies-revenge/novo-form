<?php
require_once "../vendor/autoload.php";
require_once "./autoloader.php";

ini_set("display_errors", 1);
define("APP_PATH", dirname(__DIR__));
session_start();

use CookiesRevenge\NovoForm\Form;
use CookiesRevenge\NovoForm\Fields\Custom;

echo "<head>";
echo "<title>BOOK FORM</title>";
// include bootstrap stylesheet on the page
echo "<link rel=\"stylesheet\" href=\"https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css\">";
echo "</head>";

$novoFormObject = new Form("./maps/book_form.xml");

foreach ($novoFormObject->GetFieldsByType("relation") as $rel) {
    
}
if (isset($_GET["ID"])) {
    $book = \Test\Models\BookQuery::create()->findPk($_GET["ID"]);
    $record = $book->toArray();
    foreach ($novoFormObject->GetFieldsByType("relation") as $rel) {

        $getter = "get{$rel->GetName()}";
        if ($rel->GetRelationType() === "Child")
            $getter .= "s";

        $record[$rel->GetName()] = $book->$getter()->toArray();
    }
    $novoFormObject->SetRecord($record);
}

if (isset($_GET["SUCCESS"])) {
    $novoFormObject->AddPrecedingPartial("partials/form_success.tpl");
}

$novoFormObject->SetFieldItems("AuthorId", [
    ["Id" => 1, "Title" => "Leo Tolstoy"],
    ["Id" => 2, "Title" => "Charles Bukowski"],
    ["Id" => 3, "Title" => "Fyodor Mikhailovich Dostoevsky"],
    ["Id" => 4, "Title" => "Knut Hamsun"]
]);

$novoFormObject->SetFieldItems("GenreId", [
    ["Id" => 1, "Title" => "Fantasy"],
    ["Id" => 2, "Title" => "Classic"],
    ["Id" => 3, "Title" => "Modern Psychology"]
]);

$novoFormObject->GetFieldByName("PublishDate")
    ->SetToValueProcessor(function ($value) {
        if (empty($value))
            return time();
        else
            return strtotime($value);
    });

echo $novoFormObject->ToHtml();