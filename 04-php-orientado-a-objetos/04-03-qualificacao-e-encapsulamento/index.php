<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("04.03 - Qualificação e encapsulamento");

/*
 * [ namespaces ] http://php.net/manual/pt_BR/language.namespaces.basics.php
 */
fullStackPHPClassSession("namespaces", __LINE__);

require __DIR__ . "/classes/App/Template.php";
require __DIR__ . "/classes/Web/Template.php";

$appTemplate = new App\Template();
$webTemplate = new Web\Template();

var_dump([
    $appTemplate,
    $webTemplate
]);

use App\Template;
use Web\Template AS WebTemplate;

$appUseTemplate = new Template();
$webUseTemplate = new WebTemplate();

var_dump([
    $appUseTemplate,
    $webUseTemplate
]);


/*
 * [ visibilidade ] http://php.net/manual/pt_BR/language.oop5.visibility.php
 */
fullStackPHPClassSession("visibilidade", __LINE__);

require __DIR__ . "/source/Qualifield/User.php";

$user = new \Souce\Qualifield\User;

// $user->firstName = "Tarcisio";
// $user->lastName = "Pereira";

// $user->setFirstName("Tarcisio");
// $user->setLastName("Pereira");

var_dump([
    $user,
    get_class_methods($user)
]);

echo "<p>O email de {$user->getFirstName()} é {$user->getEmail()}</p>";


/*
 * [ manipulação ] Classes com estruturas que abstraem a rotina de manipulação de objetos
 */
fullStackPHPClassSession("manipulação", __LINE__);

$tarcisio = $user->setUser("Tarcisio", "Pereira", "cursos@gmail.com");

$kaue = new \Souce\Qualifield\User;
$kaue->setUser(
    "Kaue",
    "Cardoso",
    "cursos@gmail.com"
);

if (!$tarcisio) {
    echo "<p class='trigger error'>{$user->getError()}</p>";
}

var_dump([
    $user,
    $kaue
]);
