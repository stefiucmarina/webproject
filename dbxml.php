<?php

$conn = mysqli_connect("localhost", "root", "", "tw");


if ($conn === false) {
    die("ERROR: Could not connect. "
        . mysqli_connect_error());
}

$fire=mysqli_query($conn, "select * from races");

$xml = new XMLWriter();
$xml -> openURI("php://output");
$xml -> startDocument();
$xml -> setIndent(true);
$xml-> startElement('races');


while($row=mysqli_fetch_assoc($fire))
    {
        $xml -> startElement('data');
            $xml -> startElement('id');
            $xml -> writeRaw($row['id']);
            $xml -> endElement();

            $xml -> startElement('race');
            $xml -> writeRaw($row['race']);
            $xml -> endElement();

            $xml -> startElement('odd_1');
            $xml -> writeRaw($row['odd_1']);
            $xml -> endElement();

            $xml -> startElement('odd_2');
            $xml -> writeRaw($row['odd_2']);
            $xml -> endElement();

            $xml -> startElement('date');
            $xml -> writeRaw($row['date']);
            $xml -> endElement();

            $xml -> startElement('winner');
            $xml -> writeRaw($row['winner']);
            $xml -> endElement();
        $xml -> endElement();
    }
$xml -> endElement();
header('Content-Type: text/xml');
$xml -> flush();

?>