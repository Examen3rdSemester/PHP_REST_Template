<?php
// Dette tillader at tilføje et objekt til databasen hvorefter den reloader frontpage.
$ChangeString = $_POST["ChangeString"];
$ChangeString1 = $_POST["ChangeString1"];
$ChangeInteger = $_POST["ChangeInteger"];
$ChangeDouble = $_POST["ChangeDouble"];
$posted = false;

$data = array("ChangeString" => $ChangeString, "ChangeString1" => $ChangeString1, "ChangeInteger" => $ChangeInteger, "ChangeDouble" => $ChangeDouble);
$json_string = json_encode($data);

$uri = "http://wcfresteksamen.azurewebsites.net/service1.svc/change";
$ch = curl_init($uri);
// curl is good for more complex operations than just plain GET
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly.

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_string),
        $posted = true
    )
);

$jsondata = curl_exec($ch);
$result = json_decode($jsondata, true);
if( $posted ) {
    if( $result )
        echo "<script type='text/javascript'>alert('submitted successfully!')</script>";
    else
        echo "<script type='text/javascript'>alert('failed!')</script>";
}
print_r($result);

//https://stackoverflow.com/questions/46553921/how-to-move-from-current-php-page-to-another-php-page-if-condition-true
//$host = $_SERVER['HTTP_HOST'];
//header("Location: http://{$host}/phpTwigRESTconsumerSchool/controllers/teacherbyname.php");
//return;