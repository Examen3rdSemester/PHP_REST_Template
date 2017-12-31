<?php

$uri = "http://wcfresteksamen.azurewebsites.net/service1.svc/change";

$jsondata = file_get_contents($uri);

$convertToAssociativeArray = true;

$alleobjekter = json_decode($jsondata,$convertToAssociativeArray);


require_once '../vendor/autoload.php';

Twig_Autoloader::register();

$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader,array('auto_reload'=> true));

$template = $twig->loadTemplate('alleobjekter.html.twig');


$parametersToTwig = array("alleobjekter"=>$alleobjekter);
echo $template->render($parametersToTwig);