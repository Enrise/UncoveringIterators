<?php

/**
 * Basic settings
 */
error_reporting(E_ALL | E_STRICT);
ini_set('display_errors', true);

if (PHP_VERSION < '5.3')
{
	throw new Exception('Consider upgrading to PHP 5.3+');
}

/**
 * Set the include path
 */
set_include_path(__DIR__ . '/classes' . PATH_SEPARATOR . __DIR__ . '/classes/getid3');

/**
 * Autoloader
 *
 * @param string $className
 * @return void
 */
function __autoload($className)
{
    require_once str_replace('_', '/', $className) . '.php';
}

/**
 * Wrapper for loading a file
 *
 * @param string $file
 * @return string
 * @throws Exception
 */
function loadFile($file)
{
    $contents = file_get_contents($file);
    if (false === $contents)
    {
        throw new Exception('Failed to load file "' . $file . '"');
    }
    return $contents;
}