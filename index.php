<?php
$xml = new DOMDocument;
$xml->load('routes.xml');

$xsl = new DOMDocument;
$xsl->load('transform.xsl');

$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

echo $proc->transformToXML($xml);
?>
