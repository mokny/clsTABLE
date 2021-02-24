# clsTABLE
Easily print tables on the screen from an associative array

```php
//Some Array. In reality you'll get this from a MySQL Result
$person = array();
$person['name'] = "John Doe";
$person['age'] = 55;
$person['privatedata'] = "A private thing";

$tablearr[] = $person;

$person = array();
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
$t->SetHeaders(array("name" => "Full Name", "age" => "Curren Age"));
$t->AddRows($tablearr);
$t->Output();

``
