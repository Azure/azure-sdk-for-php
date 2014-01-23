<?php
require_once 'vendor/autoload.php';
require_once 'DemoController.php';

/**
 Front controller for the site. It serves url like index.php?q=actionName
 All the logic is in the DemoController class
 */
$controller = new \DemoController();

$action = ((isset($_GET['q'])) && (method_exists($controller, $_GET['q'])))
    ? $_GET['q']
    : 'processFile';
$result = $controller->$action();

include $action . 'Template.php';

?>