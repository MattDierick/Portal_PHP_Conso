<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Mise a jour de la conso</title>
</head>
<body>
<?php
if(isset($_REQUEST['ok'])){
        echo "Submit OK";

        $xml = new DOMDocument('1.0','UTF-8');
        $xml->load('conso2.xml');


        $rootTag = $xml->getElementsByTagName('conso')->item(0);
        
        echo "RootTag";

        $dataTag = $xml->createElement('data');

        echo "DataTag";

        $SuezTag = $xml->createElement('Suez',$_REQUEST['Suez']);
        $EDFTag = $xml->createElement('EDF',$_REQUEST['EDF']);
        $GDFTag = $xml->createElement('GDF',$_REQUEST['GDF']);

        echo "Append1";

        $dataTag->appendChild($SuezTag);
        $dataTag->appendChild($EDFTag);
        $dataTag->appendChild($GDFTag);
        
        echo "Append2 : $dataTag";

        $rootTag->appendChild($dataTag);

        echo "Save";

        $xml->save('conso2.xml');
}

?>

<form action="conso.php" method="post">
Suez : <input type="text" name="Suez"/>
EDF : <input type="text" name="EDF"/>
GDF : <input type="text" name="GDF"/>
<input type="submit" name="ok" value="add"/>
</form>

</body>
</html>
