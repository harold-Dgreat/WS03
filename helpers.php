<?php

function basePath($path = '')
{
    return __DIR__ . '/' . $path;
}

function loadView($name, $data = [])
{
    $viewPath = basePath("App/Views/{$name}.view.php");

    if (file_exists($viewPath)) {
        extract($data);
        require $viewPath;
    } else {
        echo "View '{$name}' not found.";
        echo "<br>";
        echo "Looking for: " . $viewPath;
    }
}

function loadPartial($name, $data = [])
{
    $partialPath = basePath("App/Views/Partials/{$name}.php");

    if (file_exists($partialPath)) {
        extract($data);
        require $partialPath;
    } else {
        echo "Partial '{$name}' not found.";
        echo "<br>";
        echo "Looking for: " . $partialPath;
    }
}

function inspect($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
}



function formatSalary($salary)
{
    if ($salary === null || $salary === '') {
        return 'Not specified';
    }

    return '$' . number_format((float) $salary);
}

function inspectAndDie($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

/**
 * Sanitize Data
 * 
 * @param string $dirty
 * @param string
 */

function sanitize($dirty) {
    return filter_var(trim($dirty),
    FILTER_SANITIZE_SPECIAL_CHARS);
}

/**
 * Redirect to a given URL
 * 
 * @param string $url
 * @return void
 */
function redirect($url){
    header("Location: {$url}");
}