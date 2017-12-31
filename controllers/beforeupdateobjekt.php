<?php
$id = $_GET["id"];
$uri = "http://wcfresteksamen.azurewebsites.net/service1.svc/change/" . $id;
$jsondata = file_get_contents($uri);
//print_r($jsondata);
$convertToAssociativeArray = true;
$objekt = json_decode($jsondata, $convertToAssociativeArray);
require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('updateobjekt.html.twig');
$parametersToTwig = array("objekt" => $objekt);
echo $template->render($parametersToTwig);