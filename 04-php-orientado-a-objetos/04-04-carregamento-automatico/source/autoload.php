<?php
spl_autoload_register(function ($class) {
    $prefix = "Source\\";
    $baseDir = __DIR__ . "/";

    $len = strlen($prefix);

    var_dump([
        strncmp($prefix, $class, $len)
    ]);
    
    var_dump([
        $class,
        $prefix,
        $baseDir
    ]);
});