<?php
spl_autoload_register(function ($class) {
    $part = explode('\\', $class);
    $classFileName = realpath(implode(DIRECTORY_SEPARATOR, [__DIR__, '..', 'app', 'src', end($part) . '.php']));

    if (file_exists($classFileName)) {
        include_once($classFileName);
    }
});
