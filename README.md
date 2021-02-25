# clsTABLE
Easily print tables on the screen from an associative array

```php
include("clsTABLE.php");


//Some Array. In reality you'll get this from a MySQL Result
$person = array();
$person['id'] = 1;
$person['name'] = "John Doe";
$person['age'] = 55;
$person['privatedata'] = "A private thing";

$tablearr[] = $person;

$person = array();
$person['id'] = 2;
$person['name'] = "Foo Bar";
$person['age'] = 25;
$person['privatedata'] = "Some private thing";

$tablearr[] = $person;

//Generate table
$t = new TABLE();
$t->AddRows($tablearr);
$t->Output();

//Generate table and display selected items only
$t = new TABLE();
t->AddRows($tablearr);
$t->SetHeaders(array("name" => "Full Name", "age" => "Current Age"));
$$t->Output();

//Adding a column to all previous rows:
$t = new TABLE();
$t->AddRows($tablearr);
//Here a column with the key 'details' will be added to each previous row. The 'variables' will be replaced by the content of the specific row
$t->AddColumn('details','<a href="%replacebyid%">%replacebyname%</a>', array('%replacebyid%'=>'id', '%replacebyname%' => 'name'));
$t->Output();


``
