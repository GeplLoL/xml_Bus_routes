<?php
// Загрузка XML и XSL файлов
$xml = new DOMDocument;
$xml->load('routes.xml');

$xsl = new DOMDocument;
$xsl->load('transform.xsl');

// Настройка процессора XSLT
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl);

// Вывод результата
echo $proc->transformToXML($xml);
?>
