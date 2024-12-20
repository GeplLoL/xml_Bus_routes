<?php
$xml = simplexml_load_file('routes.xml');

if ($xml === false) {
    die("XML-faili laadimine ebaõnnestus.");
}

$jsonArray = [];
foreach ($xml->route as $route) {
    $jsonArray[] = [
        'id' => (string) $route['id'],
        'alguspunkt' => (string) $route->start,
        'sihtkoht' => (string) $route->end,
        'valjumisaeg' => (string) $route->departureTime,
        'hind' => (string) $route->price,
        'kestus' => (string) $route->duration
    ];
}

$json = json_encode($jsonArray, JSON_PRETTY_PRINT);

if ($json === false) {
    die("Andmete konverteerimine JSON-vormingusse ebaõnnestus.");
}

$result = file_put_contents('routes.json', $json);

if ($result === false) {
    die("JSON-faili kirjutamine ebaõnnestus.");
}

echo "JSON-fail loodi edukalt!";
?>
