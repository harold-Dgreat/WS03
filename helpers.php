<?php 

function basePath($path = '') {
    return __DIR__.'/'.$path;
}

/**
 * loadView 
 * 
 * @param string $name 
 * @return void
 * 
 */
function loadView($name) {
    require basePath("Views/{$name}.View.php");
}

/**
 * loadPartial 
 * 
 * @param string $name 
 * @return void
 * 
 */
function loadPartial($name) {
    $partialPath = basePath("Views/Partials/{$name}.php");
    if (file_exists($partialPath)) {
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found.";
    }
}
