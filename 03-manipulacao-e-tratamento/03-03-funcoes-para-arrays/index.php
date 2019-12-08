<?php
require __DIR__ . '/../../fullstackphp/fsphp.php';
fullStackPHPClassName("03.03 - Funções para arrays");

/*
 * [ criação ] https://php.net/manual/pt_BR/ref.array.php
 */
fullStackPHPClassSession("manipulação", __LINE__);

$index = [
    "AC/DC",
    "Nirvana",
    "Alter Bridge"
];

$assoc = [
    "band_1"    =>  "AC/DC",
    "band_2"    =>  "Nirvana",
    "band_3"    =>  "Alter Bridge"
];

/**
 * [adiciona no início do array]
 */
array_unshift($index, " ", "Perl Jam");
$assoc = ["band_4" => "Perl Jam", "band_5" => ""] + $assoc;

/**
 * [adiciona no final do array]
 */
array_push($index, "");
$assoc = $assoc + ["band_6" => ""];

/**
 * [remove do início do array]
 */
array_shift($index);
array_shift($assoc);

/**
 * [remove no final do array]
 */

 array_pop($index);
 array_pop($assoc);

 array_unshift($index, "");

 /**
  * [remove qualquer índice sem valor]
  */
 $index = array_filter($index);
 $assoc = array_filter($assoc);

var_dump([
    $index,
    $assoc
]);

/*
 * [ ordenação ] reverse | asort | ksort | sort
 */
fullStackPHPClassSession("ordenação", __LINE__);

$index = array_reverse($index);
$assoc = array_reverse($assoc);

/**
 * [ordena os valores e não os índices]
 */
asort($index);
asort($assoc);

ksort($index);
krsort($index);
sort($index);
rsort($index);

var_dump([
    $index,
    $assoc
]);


/*
 * [ verificação ]  keys | values | in | explode
 */
fullStackPHPClassSession("verificação", __LINE__);

var_dump([
    [
        array_keys($assoc),
        array_values($assoc),
    ]
]);

if(in_array("AC/DC", $assoc)){
    echo "<p>Cause I'm back!</p>";
}

$arrToString = implode(", ", $assoc);
echo "<p>Eu curto {$arrToString} e muitas outras</p>";
echo "{$arrToString}";

var_dump(explode(", ",$arrToString));


/**
 * [ exemplo prático ] um template view | implode
 */
fullStackPHPClassSession("exemplo prático", __LINE__);

$profile = [
    "name" => "Robson",
    "company" => "UpInside",
    "mail"  => "cursos@upinside.com.br"
];

$template = <<<TPL
    <article>
        <h1>{{name}}</h1>
        <p>{{company}}</br>
        <a href="mailto:{{mail}}" title="Enviar email para {{name}}">Enviar E-mail</a></p>
    </article>
TPL;

echo $template;

echo str_replace(
    array_keys($profile), array_values($profile), $template
);

$replaces = "{{" . implode("}}&{{", array_keys($profile)) . "}}";

// var_dump(explode("&", $replaces));
echo str_replace(
    explode("&", $replaces),
    array_values($profile),
    $template
);
