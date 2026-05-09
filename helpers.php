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

function loadPartial($name)
{
    $partialPath = basePath("App/Views/Partials/{$name}.php");

    if (file_exists($partialPath)) {
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

function inspectAndDie($value)
{
    echo '<pre>';
    var_dump($value);
    echo '</pre>';
    die();
}

function formatSalary($salary)
{
    if ($salary === null || $salary === '') {
        return 'Not specified';
    }

    return '$' . number_format((float) $salary);
}