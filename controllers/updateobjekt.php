<?php
echo "Du har nu ændret: ";
$id = $_REQUEST["Id"];
$fornavn = $_REQUEST["ChangeString"];
echo "Du har nu ændret: ".$fornavn . "s".  " ". "credentials";
$efternavn = $_REQUEST["ChangeString1"];
$løn = $_REQUEST["ChangeDouble"];
$arbejdsdage = $_REQUEST["ChangeInteger"];
$data = array("Id" => $id, "ChangeString" => $fornavn, "ChangeString1" => $efternavn, "ChangeDouble" => $løn, "ChangeInteger" => $arbejdsdage);
//print_r($data);
$json_string = json_encode($data);
$uri = "http://wcfresteksamen.azurewebsites.net/service1.svc/change";
$uri = $uri . "/". $id;
//echo $uri;
$ch = curl_init($uri);
// curl is good for more complex operations than just plain GET
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly.
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_string))
);
$jsondata = curl_exec($ch);
//print_r($jsondata);
$theUpdatedObjekt = json_decode($jsondata, true);
//print_r($theUpdatedObjekt);
//return;
// https://stackoverflow.com/questions/46553921/how-to-move-from-current-php-page-to-another-php-page-if-condition-true
//$host = $_SERVER['HTTP_HOST'];
//header("Location: http://{$host}/phpTwigRESTconsumerSchool/controllers/teacherbyname.php");
//return;