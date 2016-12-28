<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mise a jour de la conso</title>
</head>
<body>
<?php
error_reporting(E_ALL);
//phpinfo();
if(isset($_REQUEST['ok'])){
        $doc = new DOMDocument('1.0','UTF-8');

        // Create the element Conso
        $xml_Conso = $doc->createElement("Conso");
        $compteur = "2912.11";

        // Create the element for each form fields
        $xml_Suez = $doc->createElement("Suez", $_REQUEST['Suez'] + $compteur);
        $xml_EDF = $doc->createElement("EDF", $_REQUEST['EDF']);
        $xml_GDF = $doc->createElement("GDF", $_REQUEST['GDF']);

        // Append our form elements to the main conso element
        $xml_Conso->appendChild($xml_Suez);
        $xml_Conso->appendChild($xml_EDF);
        $xml_Conso->appendChild($xml_GDF);

        $doc->appendChild($xml_Conso);

        $doc->save("conso.xml");

        $content = file_get_contents("http://<YOUR_FQDN>/core/api/jeeApi.php?apikey=<YOUR_API_KEY>&type=cmd&id=180");
}

?>

<form action="conso.php" method="post">
Suez (format 00.00) :
<br>
<input type="integer" name="Suez"/>
<br>
EDF (format 00) :
<br>
<input type="integer" name="EDF"/>
<br>
GDF (format 00) :
<br>
<input type="integer" name="GDF"/>
<br>
<input type="submit" name="ok" value="add"/>
</form>

</body>
</html>