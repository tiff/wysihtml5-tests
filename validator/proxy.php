<?
require('xml2ary.inc.php');
$xml = file_get_contents('http://validator.tifftiff.de/w3c-validator/check?output=soap12&fragment=' . urlencode($_REQUEST['fragment']));

if ($_REQUEST['output'] == 'json') {
  header('Content-Type: application/json');
  echo json_encode(xml2ary($xml));
  exit;
}

header('Content-Type: text/xml');
print $xml;
?>